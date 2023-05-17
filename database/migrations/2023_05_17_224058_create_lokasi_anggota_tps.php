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
        Schema::create('lokasi_anggota_tps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('anggota_tim_id');
            $table->foreignUuid('wilayah_id');
            $table->integer('tps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_anggota_tps');
    }
};
