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
        Schema::table('assets', function (Blueprint $table) {
            $table->string('warna')->nullable()->after('merk');
            $table->string('ukuran')->nullable()->after('warna');
            $table->string('satuan')->default('pcs')->after('ukuran');

            $table->integer('stok_awal')->default(0)->after('harga');
            $table->integer('stok_saat_ini')->default(0)->after('stok_awal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn([
                'warna',
                'ukuran',
                'satuan',
                'stok_awal',
                'stok_saat_ini',
            ]);
        });
    }
};