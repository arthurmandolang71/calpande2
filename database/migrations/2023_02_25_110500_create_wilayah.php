<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wilayah', function (Blueprint $table) {
            // $table->uuid('id')->primary();
            $table->id();
            $table->string('parent_id');
            $table->string('nama');
            $table->string('level_wilayah');
            $table->string('level_label');
            $table->string('kode_prov');
            $table->string('kode_kab');
            $table->string('kode_kec');
            $table->string('kode_kel');
            $table->string('zona_waktu');
            $table->string('flag_hide');
            $table->string('kode_wilayah');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah');
    }
};
