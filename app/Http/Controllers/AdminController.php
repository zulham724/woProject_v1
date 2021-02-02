<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;

class AdminController extends Controller
{
    public function admin(){

    	return view('admin/admin');
    }
    public function index(){
    	$data['users']=role::join('users','roles.id','=','users.role_id')->get();
    	// dd($data['users']);
    	return view('admin.index',$data);
    }
    public function edit(Request $request){
      $data['role']=role::get();
      $data['user'] = User::where('id',$request['id'])->first();
      // dd($data['user']);
    	return view('admin.edit',$data);
    }
    public function delete(Request $request){
    	// dd($request);
    	User::where('id',$request['id'])->delete();
    	return redirect('staff');
    }
    public function create(){
    	$data['role']=role::get();
    	return view('admin.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role'=> 'required',
            ]);
        $data['user']=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id'=> $request['role']
        ]);
        // dd($data['user']);
        return redirect('admin/staff');
    }
    public function update(Request $request){
        $data['user']=User::where('id',$request['id'])
        ->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id'=> $request['role']
        ]);
        // dd($data['user']);
        return redirect('admin/staff');
    }
}
