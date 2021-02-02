<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_items',function(Blueprint $table){
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->string('sub_item');
            $table->string('cost');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_items');
    }
}
