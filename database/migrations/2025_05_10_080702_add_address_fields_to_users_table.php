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
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom yang belum ada di tabel users
            if (!Schema::hasColumn('users', 'province')) {
                $table->string('province')->nullable()->after('address');
            }
            
            // address dan city sudah ada di tabel awal, tidak perlu menambahkannya lagi
            
            if (!Schema::hasColumn('users', 'district')) {
                $table->string('district')->nullable()->after('city'); // Kecamatan
            }
            
            if (!Schema::hasColumn('users', 'village')) {
                $table->string('village')->nullable()->after('district'); // Kelurahan
            }
            
            // postal_code sudah ada di tabel awal
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'province',
                'district',
                'village',
            ]);
        });
    }
};
