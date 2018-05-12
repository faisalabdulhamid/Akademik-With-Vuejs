<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kelas', 20);
            $table->string('nip_wali', 50)->nullable();
            $table->unsignedInteger('grade_id')->nullable();
            $table->unsignedInteger('tahun_ajaran_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nip_wali')->references('nip')->on('pegawai')
                ->onUpdate('cascade');
            $table->foreign('grade_id')->references('id')->on('grade')
                ->onUpdate('cascade');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
