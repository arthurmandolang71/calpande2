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
        Schema::create('pemilih', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('dpt_id')->nullable();
            $table->string('dpt_id_string')->nullable();
            $table->foreignUuid('agama_id');
            $table->string('nkk');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('kawin')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('tps')->nullable();
            $table->string('wilayah_id');
            $table->string('is_invalid')->integer()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilih');
    }
};
