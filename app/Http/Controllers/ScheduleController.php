<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Acara;
use App\Order;

class ScheduleController extends Controller
{
    public function admin(){
    	$data['schedule']=Order::join('acara','orders.id','=','acara.order_id')->get();
      // dd($data['schedule']);
    	return view('schedule.admin',$data);
    }
    public function operator(){
    	$data['schedule']=Order::join('acara','orders.id','=','acara.order_id')->get();
    	// dd($data['schedule']);
      return view('schedule.operator',$data);
    }
    public function staff(){
    	$data['schedule']=Order::join('acara','orders.id','=','acara.order_id')->get();

      return view('schedule.staff',$data);
    }
}
