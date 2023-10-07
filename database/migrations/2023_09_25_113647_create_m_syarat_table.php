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
        Schema::create('m_syarat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_persyaratan',200);
            $table->string('contoh_berkas')->nullable();
            $table->string('jenis_berkas',50);
            $table->string('format',50)->nullable();
            $table->string('ukuran',50)->nullable();
            // $table->string('status_berkas',100);
            $table->string('status_persyaratan',50)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_syarat');
    }
};
