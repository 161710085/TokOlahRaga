<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->unsignedInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')
            ->on('kategoris')->onUpdate('cascade')->onDelete('cascade');      
            $table->unsignedInteger('id_merk');
            $table->foreign('id_merk')->references('id')
            ->on('merks')->onUpdate('cascade')->onDelete('cascade');      
            $table->unsignedInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')
            ->on('jenis')->onUpdate('cascade')->onDelete('cascade');      
            $table->string('deskripsi');
            $table->string('size');
            $table->string('harga');
            $table->string('stok');
            $table->string('slug');
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
        Schema::dropIfExists('barangs');
    }
}
