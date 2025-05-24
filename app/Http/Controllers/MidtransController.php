<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Midtrans\Config as MidtransConfig;
use Midtrans\Snap as MidtransSnap;
use Midtrans\Notification as MidtransNotification;

class MidtransController extends Controller
{
    public function __construct()
    {
        MidtransConfig::$serverKey = config('services.midtrans.server_key');
        MidtransConfig::$isProduction = config('services.midtrans.is_production');
        MidtransConfig::$isSanitized = config('services.midtrans.sanitized');
        MidtransConfig::$is3ds = config('services.midtrans.3ds');
    }

    public function getSnapToken(Order $order)
    {
        $orderId = $order->invoice;
        $grossAmount = $order->grand_total;
        $firstName = $order->user->name;
        $email = $order->user->email;

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => (int) $grossAmount,
        ];

        $customerDetails = [
            'first_name' => $firstName,
            'email' => $email,
        ];

        $items = [];

        foreach ($order->orderItems as $item) {
            $items[] = [
                'id' => $item->product_id,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'name' => $item->product ? $item->product->name : 'Product #' . $item->product_id,
            ];
        }

        // Tambahkan biaya ongkir sebagai item
        if ($order->ongkir > 0) {
            $items[] = [
                'id' => 'SHIPPING',
                'price' => $order->ongkir,
                'quantity' => 1,
                'name' => 'Biaya Pengiriman',
            ];
        }

        $transactionData = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $items,
        ];

        try {
            $snapToken = MidtransSnap::getSnapToken($transactionData);
            return $snapToken;
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function handleNotification(Request $request)
    {
        $notificationBody = file_get_contents('php://input');
        $notification = new MidtransNotification();

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status;
        $transactionId = $notification->transaction_id;

        $order = Order::where('invoice', $orderId)->first();

        if (!$order) {
            return response()->json([
                'status' => 'error',
                'message' => 'Order tidak ditemukan'
            ], 404);
        }

        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $paymentStatus = 'challenge';
                    $orderStatus = 'pending';
                } else {
                    $paymentStatus = 'success';
                    $orderStatus = 'processing';
                }
            }
        } else if ($status == 'settlement') {
            $paymentStatus = 'success';
            $orderStatus = 'processing';
        } else if ($status == 'pending') {
            $paymentStatus = 'pending';
            $orderStatus = 'pending';
        } else if ($status == 'deny') {
            $paymentStatus = 'failed';
            $orderStatus = 'cancelled';
        } else if ($status == 'expire') {
            $paymentStatus = 'expired';
            $orderStatus = 'cancelled';
        } else if ($status == 'cancel') {
            $paymentStatus = 'failed';
            $orderStatus = 'cancelled';
        }

        // Update status order
        $order->status = $orderStatus;
        $order->save();

        // Update atau buat payment record
        $payment = Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'payment_methode' => $type,
                'payment_status' => $paymentStatus,
                'transaction_id' => $transactionId,
                'paid_at' => $paymentStatus == 'success' ? now() : null,
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Notification processed successfully'
        ]);
    }

    public function finishRedirect()
    {
        return redirect()->route('orders')->with('success', 'Pembayaran berhasil, pesanan Anda sedang diproses!');
    }

    public function unfinishRedirect()
    {
        return redirect()->route('orders')->with('info', 'Pembayaran belum selesai. Silakan cek status pesanan Anda.');
    }

    public function errorRedirect()
    {
        return redirect()->route('orders')->with('error', 'Pembayaran gagal. Silakan coba lagi atau hubungi customer service.');
    }
} 