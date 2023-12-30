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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string("id_transaksi")->primary();
            $table->datetime("tanggal_mulai");
            $table->datetime("tanggal_selesai");
            $table->string("mobil_id", 50);
            $table->integer("user_id")->nullable();
            $table->enum("status", ["1", "0", "2"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
