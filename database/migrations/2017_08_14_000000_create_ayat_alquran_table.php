<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyatAlquranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayat_alquran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surat');
            $table->integer('nomor_surat');
            $table->integer('ayat');
            $table->integer('juz');
            $table->integer('halaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayat_alquran');
    }
}
