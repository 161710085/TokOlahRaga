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
            $table->string('nama_barang');
            $table->text('deskripsi');            
            $table->double('harga');
            $table->integer('stock');
            $table->unsignedInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('CASCADE');
            $table->unsignedInteger('id_merk');
            $table->foreign('id_merk')->references('id')->on('merks')->onDelete('CASCADE');
            $table->unsignedInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('CASCADE');
            $table->string('slug')->nullable();
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
