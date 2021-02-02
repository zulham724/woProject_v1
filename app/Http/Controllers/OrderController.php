<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Order;
use App\Biodata;
use App\Item;
use App\Acara;
use App\Notification;
use App\Pembayaran;

class OrderController extends Controller
{
    public function index(){
    	$data['orders']=Order::orderBy('created_at','desc')->get();
      $data['items']=Item::get();
      $data['acara']=Acara::get();
      $data['biodata']=Biodata::get();
      $data['pembayaran']=Pembayaran::get();
        // dd($data);
    	return view('order.index',$data);
    }
    public function create(){

    	return view('order.create');
    }
    public function edit(Request $request){
      $data['order'] = Order::where('id',$request['id'])->first();
      $data['acara'] = Acara::where('order_id',$request['id'])->get();
      $data['biodata'] = Biodata::where('order_id',$request['id'])->first();
      $data['item'] = Item::where('order_id',$request['id'])->get();
      $data['totalItem'] = Item::where('order_id',$request['id'])->count();
      $data['totalAcara'] = Acara::where('order_id',$request['id'])->count();
      // dd($data);
    	return view('order.edit',$data);
    }
    // end edit
    public function update(Request $request){
      // dd($request);
      if($request['totalHapusItem']>=1){
        for($i=0; $i<=$request['totalHapusItem']; $i++){
          if($request['hapus'.$i] != "undefined" ){
            $data['deleteItem'] = Item::where('id',$request['hapus'.$i])->delete();
          }
        }
      }
      if($request['totalHapusAcara']>=1){
        for($i=0; $i<=$request['totalHapusAcara']; $i++){
          if($request['delAcara'.$i] != "undefined" ){
            $data['deleteacara'] = Acara::where('id',$request['delAcara'.$i])->delete();
          }
        }
      }
      if($request->hasFile('upload')){
        $path = $request->file('upload')->store('uploads');
        $data['order']=Order::where('id',$request['id'])->update([
            "user_id"=>Auth::user()->id,
            "nama_pemesan"=>$request['nama_pemesan'],
            "email_pemesan"=>$request['email_pemesan'],
            "alamat_pemesan"=>$request['alamat_pemesan'],
            "kota_pemesan"=>$request['kota_pemesan'],
            "cp_pemesan"=>$request['cp_pemesan'],
            "pelaksanaan_acara"=>$request['tempat'],
            "penyelenggara"=>$request['penyelenggara'],
            "total_tamu"=>$request['total_tamu'],
            "jenis_jamuan"=>$request['jenis_jamuan'],
            "dp"=>$request['dp'],
            "file"=>$request->file('upload')->getClientOriginalName(),
            "upload"=>$path,
            ]);
      } else {
        $data['order']=Order::where('id',$request['id'])->update([
            "user_id"=>Auth::user()->id,
            "nama_pemesan"=>$request['nama_pemesan'],
            "email_pemesan"=>$request['email_pemesan'],
            "alamat_pemesan"=>$request['alamat_pemesan'],
            "kota_pemesan"=>$request['kota_pemesan'],
            "cp_pemesan"=>$request['cp_pemesan'],
            "pelaksanaan_acara"=>$request['tempat'],
            "penyelenggara"=>$request['penyelenggara'],
            "total_tamu"=>$request['total_tamu'],
            "jenis_jamuan"=>$request['jenis_jamuan'],
            "dp"=>$request['dp'],
            ]);
      }
      // dd($data['order']);
      $data['biodata']=Biodata::where('order_id',$request['id'])->update([
          // "order_id"=>$data['order']->id,
          "nama_lengkap_pria"=>$request['nama_lengkap_pria'],
          "alamat_pria"=>$request['alamat_pria'],
          "cp_pria"=>$request['cp_pria'],
          "ttl_pria"=>$request['ttl_pria'],
          "agama_pria"=>$request['agama_pria'],
          "pendidikan_pria"=>$request['pendidikan_pria'],
          "tinggi_badan_pria"=>$request['tinggi_badan_pria'],
          "berat_badan_pria"=>$request['berat_badan_pria'],
          "ayah_pria"=>$request['ayah_pria'],
          "cp_ayah_pria"=>$request['cp_ayah_pria'],
          "ibu_pria"=>$request['ibu_pria'],
          "cp_ibu_pria"=>$request['cp_ibu_pria'],
          "kakak_pria"=>$request['nama_kakak_pria'],
          "adik_pria"=>$request['nama_adik_pria'],
          "nama_lengkap_wanita"=>$request['nama_lengkap_wanita'],
          "alamat_wanita"=>$request['alamat_wanita'],
          "cp_wanita"=>$request['cp_wanita'],
          "ttl_wanita"=>$request['ttl_wanita'],
          "agama_wanita"=>$request['agama_wanita'],
          "pendidikan_wanita"=>$request['pendidikan_wanita'],
          "tinggi_badan_wanita"=>$request['tinggi_badan_wanita'],
          "berat_badan_wanita"=>$request['berat_badan_wanita'],
          "ayah_wanita"=>$request['ayah_wanita'],
          "cp_ayah_wanita"=>$request['cp_ayah_wanita'],
          "ibu_wanita"=>$request['ibu_wanita'],
          "cp_ibu_wanita"=>$request['cp_ibu_wanita'],
          "kakak_wanita"=>$request['nama_kakak_wanita'],
          "adik_wanita"=>$request['nama_adik_wanita'],
          ]);
      // dd($data['biodata']->id);
      for($i=0; $i<$request['totalItem']; $i++){
          // $data['item']=Item::where('id',$request["idItem".$i])->update([
          //     // "order_id"=>$data['order']->id,
          //     "item"=>$request["item".$i],
          //     "cost"=>$request["cost".$i],
          // ]);
          $item = Item::firstOrNew([
            'id'=>$request['idItem'.$i],
          ]);
          $item->order_id = $request['id'];
          $item->item = $request['item'.$i];
          $item->cost = $request['cost'.$i];
          $item->save();
      }
      // dd($data['item']);
      for($a=0; $a<$request['totalAcara']; $a++){
          // $data['acara']=Acara::where('id',$request["idAcara".$a])->update([
          //     // "order_id"=>$data['order']->id,
          //     "acara"=>$request["acara".$a],
          //     "tanggal"=>$request["tanggal".$a],
          //     "tempat"=>$request["tempat".$a],
          //     ]);
          $acara = Acara::firstOrNew([
            'id'=>$request['idAcara'.$a],
          ]);
          $acara->order_id = $request['id'];
          $acara->acara = $request['acara'.$a];
          $acara->tanggal = $request['tanggal'.$a];
          $acara->tempat = $request['tempat'.$a];
          $acara->jam = $request['jam'.$a];
          $acara->save();
      }

      $data['notification'] = Notification::create([
          "title"=>Auth::user()->name,
          "content"=>Auth::user()->name." telah mengedit pesanan",
          "isRead"=>0,
          ]);

      return redirect((Auth::user()->role_id == 1) ? 'admin/order' : 'operator/order' );
    }
    // end update
    public function store(Request $request){
    	// dd($request);
        if($request->hasFile('upload')){
          $path = $request->file('upload')->store('uploads');
          $data['order']=Order::create([
              "user_id"=>Auth::user()->id,
              "nama_pemesan"=>$request['nama_pemesan'],
              "email_pemesan"=>$request['email_pemesan'],
              "alamat_pemesan"=>$request['alamat_pemesan'],
              "kota_pemesan"=>$request['kota_pemesan'],
              "cp_pemesan"=>$request['cp_pemesan'],
              "pelaksanaan_acara"=>$request['tempat'],
              "penyelenggara"=>$request['penyelenggara'],
              "total_tamu"=>$request['total_tamu'],
              "jenis_jamuan"=>$request['jenis_jamuan'],
              "dp"=>$request['dp'],
              "file"=>$request->file('upload')->getClientOriginalName(),
              "upload"=>$path,
              ]);
        } else {
          $data['order']=Order::create([
              "user_id"=>Auth::user()->id,
              "nama_pemesan"=>$request['nama_pemesan'],
              "email_pemesan"=>$request['email_pemesan'],
              "alamat_pemesan"=>$request['alamat_pemesan'],
              "kota_pemesan"=>$request['kota_pemesan'],
              "cp_pemesan"=>$request['cp_pemesan'],
              "pelaksanaan_acara"=>$request['tempat'],
              "penyelenggara"=>$request['penyelenggara'],
              "total_tamu"=>$request['total_tamu'],
              "jenis_jamuan"=>$request['jenis_jamuan'],
              "dp"=>$request['dp'],
              ]);
        }
        // dd($data['order']);
        $data['biodata']=Biodata::create([
            "order_id"=>$data['order']->id,
            "nama_lengkap_pria"=>$request['nama_lengkap_pria'],
            "alamat_pria"=>$request['alamat_pria'],
            "cp_pria"=>$request['cp_pria'],
            "ttl_pria"=>$request['ttl_pria'],
            "agama_pria"=>$request['agama_pria'],
            "pendidikan_pria"=>$request['pendidikan_pria'],
            "tinggi_badan_pria"=>$request['tinggi_badan_pria'],
            "berat_badan_pria"=>$request['berat_badan_pria'],
            "ayah_pria"=>$request['ayah_pria'],
            "cp_ayah_pria"=>$request['cp_ayah_pria'],
            "ibu_pria"=>$request['ibu_pria'],
            "cp_ibu_pria"=>$request['cp_ibu_pria'],
            "kakak_pria"=>$request['nama_kakak_pria'],
            "adik_pria"=>$request['nama_adik_pria'],
            "nama_lengkap_wanita"=>$request['nama_lengkap_wanita'],
            "alamat_wanita"=>$request['alamat_wanita'],
            "cp_wanita"=>$request['cp_wanita'],
            "ttl_wanita"=>$request['ttl_wanita'],
            "agama_wanita"=>$request['agama_wanita'],
            "pendidikan_wanita"=>$request['pendidikan_wanita'],
            "tinggi_badan_wanita"=>$request['tinggi_badan_wanita'],
            "berat_badan_wanita"=>$request['berat_badan_wanita'],
            "ayah_wanita"=>$request['ayah_wanita'],
            "cp_ayah_wanita"=>$request['cp_ayah_wanita'],
            "ibu_wanita"=>$request['ibu_wanita'],
            "cp_ibu_wanita"=>$request['cp_ibu_wanita'],
            "kakak_wanita"=>$request['nama_kakak_wanita'],
            "adik_wanita"=>$request['nama_adik_wanita'],
            ]);
        // dd($data['biodata']->id);
        for($i=0; $i<=$request['totalItem']; $i++){
            $data['item']=Item::create([
                "order_id"=>$data['order']->id,
                "item"=>$request["item".$i],
                "cost"=>$request["cost".$i],
            ]);
        }
        // dd($data['item']);
        for($a=0 ; $a<=$request['totalAcara']; $a++){
            $data['acara']=Acara::create([
                "order_id"=>$data['order']->id,
                "acara"=>$request["acara".$a],
                "tanggal"=>$request["tanggal".$a],
                "tempat"=>$request["tempat".$a],
                "jam"=>$request["jam".$a],
                ]);
        }

        $data['notification'] = Notification::create([
            "title"=>Auth::user()->name,
            "content"=>Auth::user()->name." telah menerima pesanan",
            "isRead"=>0,
            ]);

    	return redirect('operator/order');
    }
    public function delete(Request $request){
        // dd($request);
        $data['notification'] = Notification::create([
            "title"=>Auth::user()->name,
            "content"=>Auth::user()->name." telah mendelete pesanan",
            "isRead"=>0,
            ]);
        $data['order']=Order::where('id',$request['id'])->delete();
        // $data['file']=Storage::delete(storage_path().'/app/'.$request['file']);
        // dd(storage_path()."/app/".$request['file']);

        return redirect('operator/order');
    }
}
