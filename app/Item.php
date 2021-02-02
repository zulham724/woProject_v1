<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    'order_id','item','cost'
    ];
    public function orders(){
    	return $this->belongsTo('App\Order');
    }
}
