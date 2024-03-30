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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->integer('matakuliah_id');
            $table->string('k_matakuliah');
            $table->integer('mahasiswa_npm');
            $table->string('krs')->nullable();
            $table->string('nidn')->nullable();
            $table->integer('kunci')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('ket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
