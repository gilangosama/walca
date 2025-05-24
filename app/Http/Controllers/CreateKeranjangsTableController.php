<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;

class CreateKeranjangsTableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Periksa apakah tabel sudah ada
        if (!Schema::hasTable('keranjangs')) {
            // Buat tabel jika belum ada
            Schema::create('keranjangs', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->integer('quantity')->default(1);
                $table->string('size')->nullable();
                $table->string('color')->nullable();
                $table->string('jenis')->nullable();
                $table->timestamps();
            });
            
            return response()->json([
                'success' => true, 
                'message' => 'Tabel keranjangs berhasil dibuat'
            ]);
        }
        
        return response()->json([
            'success' => true, 
            'message' => 'Tabel keranjangs sudah ada'
        ]);
    }
}
