<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Http\Controllers\MidtransController;

class CheckoutController extends Controller
{
    public function index()
    {
        $addresses = Auth::user()->addresses;
        // Ambil produk yang mau di-checkout dari session (atau ganti dengan query ke database keranjang user)
        $orderItems = session('orderItems', []); // array produk yang mau di-checkout
        $subtotal = collect($orderItems)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
        $shipping = 15000;
        $total = $subtotal + $shipping;
        return view('checkout', compact('addresses', 'orderItems', 'subtotal', 'shipping', 'total'));
    }

    public function placeOrder(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'address_id' => 'required',
            'payment_method' => 'required',
        ]);

        $orderItems = session('orderItems', []);
        if (empty($orderItems)) {
            return redirect()->route('checkout')->with('error', 'Keranjang kosong!');
        }

        $subtotal = collect($orderItems)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
        $shipping = 15000;
        $total = $subtotal + $shipping;

        // Buat invoice unik
        $invoice = 'INV-' . now()->timestamp;

        // Simpan order ke database
        $order = Order::create([
            'user_id' => Auth::id(),
            'invoice' => $invoice,
            'total_price' => $subtotal,
            'status' => 'pending',
            'ongkir' => $shipping,
            'grand_total' => $total,
        ]);

        // Simpan order items
        foreach ($orderItems as $item) {
            $order->orderItems()->create([
                'product_id' => $item['productId'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],
                'invoice' => $invoice, // Tambahkan invoice yang sama dengan order
            ]);
            
            // Hapus item dari keranjang database
            \App\Models\Keranjang::where('user_id', Auth::id())
                ->where('product_id', $item['productId'])
                ->when(isset($item['size']), function($query) use ($item) {
                    $query->where('size', $item['size']);
                })
                ->when(isset($item['color']), function($query) use ($item) {
                    $query->where('color', $item['color']);
                })
                ->when(isset($item['jenis']), function($query) use ($item) {
                    $query->where('jenis', $item['jenis']);
                })
                ->delete();
        }

        // Buat payment record
        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_methode' => $validated['payment_method'],
            'payment_status' => 'pending',
        ]);

        // Kosongkan session orderItems
        session()->forget('orderItems');

        // Cek metode pembayaran
        if ($validated['payment_method'] === 'cod') {
            // Untuk COD, update status order dan payment
            $order->status = 'processing';
            $order->save();
            
            $payment->payment_status = 'pending';
            $payment->save();
            
            return redirect()->route('checkout.success')->with('success', 'Order berhasil dibuat dengan metode COD!');
        } else {
            // Untuk pembayaran Midtrans
            $midtransController = new MidtransController();
            $snapToken = $midtransController->getSnapToken($order);

            if (is_string($snapToken)) {
                // Redirect ke halaman pembayaran dengan Snap Token
                return view('payment', compact('order', 'snapToken'));
            } else {
                // Jika terjadi error saat mendapatkan Snap Token
                return redirect()->route('checkout')->with('error', 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
            }
        }
    }
} 