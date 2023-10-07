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
        Schema::create('berkas_ajuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ajuan_layanan_id');
            $table->unsignedBigInteger('m_syarat_id');
            $table->string('isi_berkas');

            $table->foreign('ajuan_layanan_id')->references('id')->on('ajuan_layanan');
            $table->foreign('m_syarat_id')->references('id')->on('m_syarat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_ajuan');
    }
};
