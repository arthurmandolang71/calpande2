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
        Schema::create('pemilih_client', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('client_id');
            $table->foreignUuid('user_id');
            $table->foreignUuid('pemilih_id');
            $table->foreignUuid('level_status_id');
            $table->foreignUuid('agama_id');
            $table->string('alamat')->nullable();
            //info kontak
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('foto_ktp')->nullable();
            //info analisa
            $table->string('catatan_tim');
            $table->string('catatan_koordinator')->nullable();
            $table->string('status_penilaian');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilih_client');
    }
};
