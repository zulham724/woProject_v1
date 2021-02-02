<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata',function(Blueprint $table){
          $table->increments('id');
          $table->integer('order_id')->unsigned();
          $table->string('nama_lengkap_pria')->nullable()->default('-');
          $table->string('alamat_pria')->nullable()->default('-');
          $table->string('cp_pria')->nullable()->default('-');
          $table->string('ttl_pria')->nullable()->default('-');
          $table->string('agama_pria')->nullable()->default('-');
          $table->string('pendidikan_pria')->nullable()->default('-');
          $table->string('tinggi_badan_pria')->nullable()->default('-');
          $table->string('berat_badan_pria')->nullable()->default('-');
          $table->string('ayah_pria')->nullable()->default('-');
          $table->string('cp_ayah_pria')->nullable()->default('-');
          $table->string('ibu_pria')->nullable()->default('-');
          $table->string('cp_ibu_pria')->nullable()->default('-');
          $table->string('kakak_pria')->nullable()->default('-');
          $table->string('adik_pria')->nullable()->default('-');
          $table->string('nama_lengkap_wanita')->nullable()->default('-');
          $table->string('alamat_wanita')->nullable()->default('-');
          $table->string('cp_wanita')->nullable()->default('-');
          $table->string('ttl_wanita')->nullable()->default('-');
          $table->string('agama_wanita')->nullable()->default('-');
          $table->string('pendidikan_wanita')->nullable()->default('-');
          $table->string('tinggi_badan_wanita')->nullable()->default('-');
          $table->string('berat_badan_wanita')->nullable()->default('-');
          $table->string('ayah_wanita')->nullable()->default('-');
          $table->string('cp_ayah_wanita')->nullable()->default('-');
          $table->string('ibu_wanita')->nullable()->default('-');
          $table->string('cp_ibu_wanita')->nullable()->default('-');
          $table->string('kakak_wanita')->nullable()->default('-');
          $table->string('adik_wanita')->nullable()->default('-');
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
        Schema::drop('biodata');
    }
}
