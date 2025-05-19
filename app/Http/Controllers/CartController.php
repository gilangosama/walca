<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkoutToSession(Request $request)
    {
        $validated = $request->validate([
            'orderItems' => 'required|array',
        ]);
        session(['orderItems' => $validated['orderItems']]);
        return response()->json(['success' => true]);
    }
} 