<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Cek apakah ada parameter redirect
        if ($request->has('redirect')) {
            return redirect($request->redirect);
        }

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    
    /**
     * Migrate cart from localStorage to database
     */
    public function migrateCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'User tidak login']);
        }
        
        $cartItems = $request->input('cartItems', []);
        $userId = Auth::id();
        $successCount = 0;
        
        foreach ($cartItems as $item) {
            // Validasi product_id
            if (!isset($item['productId']) || !Product::where('id', $item['productId'])->exists()) {
                continue;
            }
            
            // Cek apakah produk sudah ada di keranjang
            $existingItem = Keranjang::where('user_id', $userId)
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
                ->first();
                
            if ($existingItem) {
                // Jika sudah ada, update quantity
                $existingItem->quantity += $item['quantity'];
                $existingItem->save();
            } else {
                // Jika belum ada, buat baru
                Keranjang::create([
                    'user_id' => $userId,
                    'product_id' => $item['productId'],
                    'quantity' => $item['quantity'],
                    'size' => $item['size'] ?? null,
                    'color' => $item['color'] ?? null,
                    'jenis' => $item['jenis'] ?? null,
                ]);
            }
            
            $successCount++;
        }
        
        return response()->json([
            'success' => true, 
            'message' => $successCount . ' item berhasil ditambahkan ke keranjang'
        ]);
    }
}
