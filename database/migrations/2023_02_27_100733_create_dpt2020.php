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
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('kawin');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('difabel');
            $table->string('ektp');
            $table->string('keterangan');
            $table->string('sumberdata');
            $table->string('tps');
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
