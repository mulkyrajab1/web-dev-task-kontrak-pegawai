<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table-> string('nip');
            $table-> string('nama_pegawai');
            $table-> string('email');
            $table-> string('password');
            $table-> string('alamat');
            $table-> string('jenis_kelamin');
            $table-> string('gaji');
            $table->timestamps();
        });

        Schema::create('jabatan', function(Blueprint $table){
            $table-> id();
            $table-> string('nama_jabatan');
            $table->timestamps();
        });

        Schema::create('kontrak', function(Blueprint $table){
            $table-> id();
            $table-> string('kontrak');
            $table-> date('kontrak_awal');
            $table-> date('kontrak_akhir');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
