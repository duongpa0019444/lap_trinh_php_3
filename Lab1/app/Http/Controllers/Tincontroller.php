<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tincontroller extends Controller
{
    //
    public function index(){
        // echo "Đây là trang chủ";
        return view('index');
    }

    public function lienhe(){
        // echo "Đây là trang liên hệ";
        return view('lienhe');
    }

    public function lay1tin($id){
        $data = ['id'=>$id];
        return view('chitiet', $data);
    }
}
