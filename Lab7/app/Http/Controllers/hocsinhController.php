<?php

namespace App\Http\Controllers;

use App\Models\hocsinh;
use Illuminate\Http\Request;

class hocsinhController extends Controller
{
    //
    public function hs(){
        return view('nhaphs');
    }

    public function hs_store(Request $request){
        $request->validate([
            'hoten' => 'required|string|min:6',
            'gioitinh' => 'required|string',
            'ngaysinh' => 'required|date'
        ]);

        hocsinh::create([
            'hoten' => $request->hoten,
            'gioitinh' => $request->gioitinh,
            'ngaysinh' => $request->ngaysinh
        ]);
        return redirect()->route('hs')->with('success', 'Thêm học sinh thành công');
    }

}
