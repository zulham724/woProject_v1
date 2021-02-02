<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acara',function(Blueprint $table){
          $table->increments('id');
          $table->integer('order_id')->unsigned();
          $table->string('acara')->nullable()->default('-');
          $table->string('tanggal')->nullable()->default('-');
          $table->string('tempat')->nullable()->default('-');
          $table->string('jam')->nullable()->default('-');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('acara');
    }
}
