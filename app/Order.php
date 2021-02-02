<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','nama_pemesan','email_pemesan','alamat_pemesan','kota_pemesan','cp_pemesan',
    'tempat','pelaksanaan_acara','penyelenggara','total_tamu','jenis_jamuan','upload','file','dp',
    ];
    public function items(){
    	return $this->hasMany('App\Item');
    }
}
