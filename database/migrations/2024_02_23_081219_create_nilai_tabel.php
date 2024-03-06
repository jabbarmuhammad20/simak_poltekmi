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
        Schema::create('nilai_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa_npm');
            $table->string('k_matkul');
            $table->string('krs')->nullable();
            $table->string('nidn')->nullable();
            $table->string('nilai')->nullable();
            $table->string('ket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_tabel');
    }
};
