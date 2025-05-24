<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Hanya ambil keranjang dari database jika user sudah login
        if (Auth::check()) {
            $cartItems = Keranjang::where('user_id', Auth::id())->with('product')->get();
            return view('cart', compact('cartItems'));
        }
        
        // Jika tidak login, gunakan local storage (tampilan dihandle oleh JS)
        return view('cart');
    }
    
    public function addToCart(Request $request)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda harus login terlebih dahulu',
                'redirect' => route('login', ['redirect' => route('cart')])
            ]);
        }
        
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'jenis' => 'nullable|string',
        ]);
        
        $userId = Auth::id();
        $product = Product::findOrFail($validated['product_id']);
        
        // Cek apakah produk dengan kriteria yang sama sudah ada di keranjang
        $existingItem = Keranjang::where('user_id', $userId)
            ->where('product_id', $validated['product_id'])
            ->when(isset($validated['size']), function($query) use ($validated) {
                $query->where('size', $validated['size']);
            })
            ->when(isset($validated['color']), function($query) use ($validated) {
                $query->where('color', $validated['color']);
            })
            ->when(isset($validated['jenis']), function($query) use ($validated) {
                $query->where('jenis', $validated['jenis']);
            })
            ->first();
            
        if ($existingItem) {
            // Jika sudah ada, update quantity
            $existingItem->quantity += $validated['quantity'];
            $existingItem->save();
        } else {
            // Jika belum ada, buat baru
            Keranjang::create([
                'user_id' => $userId,
                'product_id' => $validated['product_id'],
                'quantity' => $validated['quantity'],
                'size' => $validated['size'] ?? null,
                'color' => $validated['color'] ?? null,
                'jenis' => $validated['jenis'] ?? null,
            ]);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang'
        ]);
    }
    
    public function updateQuantity(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda harus login terlebih dahulu'
            ]);
        }
        
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cartItem = Keranjang::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
            
        $cartItem->quantity = $validated['quantity'];
        $cartItem->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Quantity berhasil diupdate'
        ]);
    }
    
    public function removeItem($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda harus login terlebih dahulu'
            ]);
        }
        
        $cartItem = Keranjang::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
            
        $cartItem->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus dari keranjang'
        ]);
    }
    
    public function checkoutToSession(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda harus login terlebih dahulu',
                'redirect' => route('login', ['redirect' => route('checkout')])
            ]);
        }
        
        $userId = Auth::id();
        
        // Ambil keranjang user
        $cartItems = Keranjang::where('user_id', $userId)
            ->with('product')
            ->get()
            ->map(function($item) {
                return [
                    'productId' => $item->product_id,
                    'productName' => $item->product->name,
                    'productImage' => $item->product->image[0] ?? null,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'size' => $item->size,
                    'color' => $item->color,
                    'jenis' => $item->jenis,
                ];
            });
        
        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong']);
        }
        
        session(['orderItems' => $cartItems->toArray()]);
        return response()->json(['success' => true]);
    }
} 