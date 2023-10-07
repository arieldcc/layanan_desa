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
        Schema::create('ajuan_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_layanan_id');
            $table->unsignedBigInteger('m_penduduk_id');
            $table->string('tiket',50);
            $table->string('status_berkas',100)->comment('Pengajuan, Proses, Selesai, Diambil');
            $table->string('registrasi',100)->comment('tahap 1 : waktu registrasi ');
            $table->string('backoffice',100)->nullable()->comment('tahap 2 : backoffice');
            $table->string('penetapan',100)->nullable()->comment('Tahap 3 : Penetapan');
            $table->string('pengambilan',100)->nullable()->comment('Tahap 4 : Pengambilan.');
            $table->string('keterangan',200)->nullable()->comment('Keterangan pengajuan');
            $table->string('hasil_file',200)->nullable()->comment('Hasil dari pengajuan berupa file');

            $table->foreign('m_penduduk_id')->references('id')->on('m_penduduk');
            $table->foreign('m_layanan_id')->references('id')->on('m_layanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajuan_layanan');
    }
};
