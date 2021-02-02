<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Pembayaran;
use App\Notification;

class PembayaranController extends Controller
{
    public function create(){
      $data['orders'] = Order::get();
      $data['pembayaran'] = Pembayaran::get();
      return view('pembayaran.create',$data);
    }
    public function store(Request $request){
      // dd($request);
      $data['input'] = Pembayaran::create([
        "order_id" => $request['order_id'],
        "angsuran" => $request['angsuran'],
      ]);
      $data['notification'] = Notification::create([
          "title"=>Auth::user()->name,
          "content"=>Auth::user()->name." telah menerima angsuran",
          "isRead"=>0,
          ]);

      return redirect((Auth::user()->role_id == 1) ? 'admin/order' : 'operator/order' );
    }
    public function update(Request $request){
      // dd($request);
      for($i=1; $i<=$request['totalAngsuran']; $i++){
        $data['angsuran'] = Pembayaran::where('id',$request['idAngsuran'.$i])->update([
          "angsuran" => $request['angsuran'.$i],
        ]);
      }
      return redirect((Auth::user()->role_id == 1) ? 'admin/pembayaran' : 'operator/pembayaran');
    }
    public function delete($id){
        // dd($id);
        $data['notification'] = Notification::create([
            "title"=>Auth::user()->name,
            "content"=>Auth::user()->name." telah menghapus pembayaran",
            "isRead"=>0,
            ]);
        $data['pembayaran']=Pembayaran::where('id',$id)->delete();
        // $data['file']=Storage::delete(storage_path().'/app/'.$request['file']);
        // dd(storage_path()."/app/".$request['file']);

        return redirect('admin/pembayaran');
    }
}
