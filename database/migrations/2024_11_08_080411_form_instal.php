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
        Schema::create('form_install', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nomor');
            $table->date('tanggal');
            $table->string('kode_asset');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('jabatan');
            $table->string('divisi_cabang');
            $table->string('it')->nullable();
            $table->date('date_it')->nullable();
            $table->string('cek');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_instal');
    }
};
