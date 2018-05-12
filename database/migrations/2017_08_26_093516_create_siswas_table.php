<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nis', 20)->primary();
            $table->string('nisn', 20)->unique()->nullable();
            $table->string('nama', 50)->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('agama', ['Islam', 'Khatolik', 'Protestan', 'Hindu', 'Budha'])->default('Islam')->nullable();
            $table->tinyInteger('anak_ke')->nullable();
            $table->enum('status_keluarga', ['Anak Kandung', 'Anak Angkat'])->default('Anak Kandung')->nullable();
            $table->string('alamat')->nullable();

            $table->unsignedInteger('diterima_grade')->nullable();
            $table->date('diterima_tanggal')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('tahun_ijazah', 4)->nullable();
            $table->string('nomor_ijazah', 20)->nullable();
            $table->string('foto')->nullable();
            $table->enum('status_belajar', ['Aktif', 'Tidak Aktif'])->nullable();

            $table->string('telepon', 20)->nullable()->unique();
            $table->string('email', 100)->nullable()->unique();
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
        Schema::dropIfExists('siswa');
    }
}
