<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\Notification;

class NotificationController extends Controller
{
    public function readNotif(Request $request){
    	// $data = Input::all();	
    	// $data=$request;
    	$data['hasRead'] = Notification::where('id',$request['id'])->update([
    		"isRead" => 1,
    		]);
    	$data['countNotif'] = Notification::where('isRead',0)->count();
    	$data['notification'] = Notification::where('isRead',0)->get();
    	return Response::json($data);
    }
}
