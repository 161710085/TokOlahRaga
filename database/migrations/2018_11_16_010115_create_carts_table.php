<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')
            ->on('users')->onUpdate('cascade')->onDelete('cascade');      
            $table->unsignedInteger('id_barang');
            $table->foreign('id_barang')->references('id')
            ->on('barangs')->onUpdate('cascade')->onDelete('cascade');      
            $table->integer('jumlah');
            $table->integer('total_harga');
            
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
        Schema::dropIfExists('carts');
    }
}
