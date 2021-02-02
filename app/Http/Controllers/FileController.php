<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index($filename){
    	$data = Storage::get($filename);
    	return $data;
    }
    public function delete(){
      // dd(storage_path());
      $data = Storage::delete('http://localhost/woProject//app/uploads/PYxCdWQ01r6uSk4mkH2BoaGLXZC6Gg1FEIMwYxMm.png');
      return "yey";
    }
}
