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
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('no_induk')->nullable();
            $table->string('nama_leng')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('divisi_cbg')->nullable();
            $table->string('kode_ass')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('spesifikasi')->nullable();
            $table->string('keluhan')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
