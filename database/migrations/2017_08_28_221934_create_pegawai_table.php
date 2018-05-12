<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('nip', 50)->primary();
            $table->string('nama', 50)->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('agama', ['Islam', 'Khatolik', 'Protestan', 'Hindu', 'Budha'])->default('Islam');
            $table->enum('pendidikan', ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'])->default('SMA');
            $table->string('alamat')->nullable();
            $table->string('telepon', 20)->nullable();
            $table->date('diterima_tanggal')->nullable();

            $table->string('foto')->nullable();

            $table->enum('status_kerja', ['Aktif', 'Tidak Aktif'])->default('Aktif')->nullable();

            $table->string('email', 100)->unique()->nullable();
            $table->string('password')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
}
