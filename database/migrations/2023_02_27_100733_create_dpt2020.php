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
        Schema::create('dpt2020', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('string_id');
            $table->string('kpu_id');
            $table->string('nkk');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('kawin')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();;
            $table->string('rt')->nullable();;
            $table->string('rw')->nullable();;
            $table->string('difabel')->nullable();;
            $table->string('ektp')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('sumberdata')->nullable();
            $table->string('tps')->nullable();
            $table->foreignId('wilayah_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dpt2020');
    }
};
