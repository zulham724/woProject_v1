<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = "biodata";
    protected $fillable = [
    'order_id','nama_lengkap_pria','alamat_pria',
    'cp_pria','ttl_pria','agama_pria','pendidikan_pria',
    'tinggi_badan_pria','berat_badan_pria','ayah_pria',
    'cp_ayah_pria','ibu_pria','cp_ibu_pria','kakak_pria','adik_pria',
    'nama_lengkap_wanita','alamat_wanita',
    'cp_wanita','ttl_wanita','agama_wanita','pendidikan_wanita',
    'tinggi_badan_wanita','berat_badan_wanita','ayah_wanita',
    'cp_ayah_wanita','ibu_wanita','cp_ibu_wanita','kakak_wanita','adik_wanita',
    ];
}
