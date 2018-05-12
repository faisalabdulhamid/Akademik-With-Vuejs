<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrangTuaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ayah', 50)->nullable();
            $table->enum('pendidikan_ayah', ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'])->default('SMA')->nullable();
            $table->enum('pekerjaan_ayah', ['PNS', 'TNI/POLRI', 'Wiraswasta', 'Lainnya'])->default('Lainnya')->nullable();
            $table->string('telepon_ayah', 20)->nullable();

            $table->string('ibu', 50)->nullable();
            $table->enum('pendidikan_ibu', ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'])->default('SMA')->nullable();
            $table->enum('pekerjaan_ibu', ['PNS', 'TNI/POLRI', 'Wiraswasta', 'Ibu Rumah Tangga', 'Lainnya'])->default('Ibu Rumah Tangga')->nullable();
            $table->string('telepon_ibu', 20)->nullable();
            $table->string('alamat')->nullable();

            $table->string('wali', 50)->nullable();
            $table->enum('pendidikan_wali', ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'])->default('SMA')->nullable();
            $table->enum('pekerjaan_wali', ['PNS', 'TNI/POLRI', 'Wiraswasta', 'Lainnya'])->default('Lainnya')->nullable();
            $table->string('telepon_wali', 20)->nullable();
            $table->string('alamat_wali')->nullable();

            $table->string('nis', 20)->unique();
            $table->timestamps();

            $table->foreign('nis')->references('nis')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orang_tua');
    }
}
