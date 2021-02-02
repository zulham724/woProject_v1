<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders',function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nama_pemesan')->nullable()->default('-');
            $table->string('email_pemesan')->nullable()->default('-');
            $table->string('alamat_pemesan')->nullable()->default('-');
            $table->string('kota_pemesan')->nullable()->default('-');
            $table->string('cp_pemesan')->nullable()->default('-');
            $table->string('pelaksanaan_acara')->nullable()->default('-');
            $table->string('penyelenggara')->nullable()->default('-');
            $table->string('total_tamu')->nullable()->default('-');
            $table->string('jenis_jamuan')->nullable()->default('-');
            $table->string('dp')->nullable();
            $table->string('file')->nullable();
            $table->string('upload')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
