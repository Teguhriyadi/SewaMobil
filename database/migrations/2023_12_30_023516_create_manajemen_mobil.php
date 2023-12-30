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
        Schema::create('manajemen_mobil', function (Blueprint $table) {
            $table->string("id_manajemen")->primary();
            $table->string("merek", 100);
            $table->string("model", 50);
            $table->string("nomor_plat", 50);
            $table->double("tarif");
            $table->integer("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemen_mobil');
    }
};
