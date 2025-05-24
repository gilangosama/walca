<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shops', compact('products'));
    }

    public function detail(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product-detail', compact('product'));
    }

    public function addKeranjang(Request $request)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login', ['redirect' => route('cart')]);
        }
        
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'size'       => 'nullable|string|max:50',
            'color'      => 'nullable|string|max:50',
            'jenis'      => 'nullable|string|max:50',
        ]);

        $userId = Auth::id();

        // Cek apakah produk dengan kriteria yang sama sudah ada di keranjang user
        $keranjang = Keranjang::where('user_id', $userId)
            ->where('product_id', $validated['product_id'])
            ->when(isset($validated['size']), function ($query) use ($validated) {
                $query->where('size', $validated['size']);
            })
            ->when(isset($validated['color']), function ($query) use ($validated) {
                $query->where('color', $validated['color']);
            })
            ->when(isset($validated['jenis']), function ($query) use ($validated) {
                $query->where('jenis', $validated['jenis']);
            })
            ->first();

        if ($keranjang) {
            // Jika sudah ada, update quantity
            $keranjang->quantity += $validated['quantity'];
            $keranjang->save();
        } else {
            // Jika belum ada, buat baru
            Keranjang::create([
                'user_id'    => $userId,
                'product_id' => $validated['product_id'],
                'quantity'   => $validated['quantity'],
                'size'       => $validated['size'] ?? null,
                'color'      => $validated['color'] ?? null,
                'jenis'      => $validated['jenis'] ?? null,
            ]);
        }

        return redirect()->route('cart')->with('status', 'Produk berhasil ditambahkan ke keranjang.');
    }
}
