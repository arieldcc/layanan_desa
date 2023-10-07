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
        Schema::create('m_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik',50);
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir', 50);
            $table->string('jenis_kel', 50);
            $table->string('agama', 50);
            $table->string('status_nikah', 50);
            $table->string('kewarganegaraan',50);
            $table->string('jalan')->nullable(true);
            $table->string('dusun',100)->nullable(true);
            $table->string('rt',15)->nullable(true);
            $table->string('rw',15)->nullable(true);
            $table->string('kelurahan',150)->nullable(true);
            $table->string('kode_pos',20)->nullable(true);
            $table->string('telepon',20)->nullable(true);
            $table->string('handphone',20)->nullable(true);
            $table->string('email',200);
            $table->string('npwp',55)->nullable(true);
            $table->string('pekerjaan',200)->nullable(true);
            $table->string('penghasilan',200)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_penduduk');
    }
};
