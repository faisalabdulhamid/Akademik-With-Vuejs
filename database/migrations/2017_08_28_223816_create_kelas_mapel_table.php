<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_mapel', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mapel_id')->nullable();
            $table->unsignedInteger('kelas_id')->nullable();
            $table->string('nip_mengajar', 50);

            $table->foreign('mapel_id')->references('id')->on('mata_pelajaran')
                ->onUpdate('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')
                ->onUpdate('cascade');
            $table->foreign('nip_mengajar')->references('nip')->on('pegawai')
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
        Schema::dropIfExists('kelas_mapel');
    }
}
