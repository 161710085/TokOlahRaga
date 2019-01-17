<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->unsignedInteger('id_kota');
			$table->foreign('id_kota')
				->references('id')->on('kotas')
				->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.php
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatans');
    }
}
