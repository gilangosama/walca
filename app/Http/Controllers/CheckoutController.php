<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\User;

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
        $order = \App\Models\Order::create([
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
        }

        // Kosongkan session orderItems
        session()->forget('orderItems');

        return redirect()->route('checkout.success')->with('success', 'Order berhasil dibuat!');
    }
} 