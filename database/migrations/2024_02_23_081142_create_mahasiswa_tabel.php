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
        Schema::create('mahasiswa_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->integer('npm')->unique();
            $table->string('semester');
            $table->string('prog_studi');
            $table->string('k_dosenwali');
            $table->string('aktif');
            $table->string('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_tabel');
    }
};
