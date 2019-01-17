<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')
            ->on('users')->onUpdate('cascade')->onDelete('cascade');      
            $table->string('nama');
            $table->unsignedInteger('id_prov');
            $table->foreign('id_prov')->references('id')
            ->on('provinsis')->onUpdate('cascade')->onDelete('cascade'); 
            $table->unsignedInteger('id_kota');
            $table->foreign('id_kota')->references('id')
            ->on('kotas')->onUpdate('cascade')->onDelete('cascade'); 
            $table->unsignedInteger('id_kecamatan');
            $table->foreign('id_kecamatan')->references('id')
            ->on('kecamatans')->onUpdate('cascade')->onDelete('cascade'); 
            $table->integer('kodepos');
            $table->string('alamat');
            $table->string('email');
            $table->integer('phone');
            $table->unsignedInteger('id_cart');
            $table->foreign('id_cart')->references('id')
            ->on('carts')->onUpdate('cascade')->onDelete('cascade'); 
           
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
        Schema::dropIfExists('checkouts');
    }
}
