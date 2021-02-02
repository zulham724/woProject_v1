<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = "acara";
    protected $fillable = [
    'order_id','acara','tanggal','tempat','jam',
    ];
}
