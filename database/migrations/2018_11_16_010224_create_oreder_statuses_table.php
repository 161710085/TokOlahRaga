<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrederStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oreder_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')
            ->on('users')->onUpdate('cascade')->onDelete('cascade');      
            $table->unsignedInteger('id_barang');
            $table->foreign('id_barang')->references('id')
            ->on('barangs')->onUpdate('cascade')->onDelete('cascade');      
            $table->unsignedInteger('id_checkout');
            $table->foreign('id_checkout')->references('id')
            ->on('checkouts')->onUpdate('cascade')->onDelete('cascade');      
            $table->unsignedInteger('id_bukti');
            $table->foreign('id_bukti')->references('id')
            ->on('buktis')->onUpdate('cascade')->onDelete('cascade');      
           
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
        Schema::dropIfExists('oreder_statuses');
    }
}
