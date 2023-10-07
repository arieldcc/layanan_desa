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
        Schema::create('syarat_pelayanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_layanan_id');
            $table->unsignedBigInteger('m_syarat_id');

            $table->foreign('m_layanan_id')->references('id')->on('m_layanan');
            $table->foreign('m_syarat_id')->references('id')->on('m_syarat');
            // $table->foreignId('m_syarat_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syarat_pelayanans');
    }
};
