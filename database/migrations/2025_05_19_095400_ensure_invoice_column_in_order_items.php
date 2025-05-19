<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Pertama cek apakah kolom invoice sudah ada
        if (Schema::hasColumn('order_items', 'invoice')) {
            // Jika sudah ada, ubah menjadi nullable
            Schema::table('order_items', function (Blueprint $table) {
                $table->string('invoice')->nullable()->change();
            });
        } else {
            // Jika belum ada, tambahkan kolom invoice sebagai nullable
            Schema::table('order_items', function (Blueprint $table) {
                $table->string('invoice')->nullable()->after('subtotal');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak perlu menghapus kolom, hanya kembalikan ke NOT NULL jika perlu
        if (Schema::hasColumn('order_items', 'invoice')) {
            Schema::table('order_items', function (Blueprint $table) {
                $table->string('invoice')->nullable(false)->change();
            });
        }
    }
};
