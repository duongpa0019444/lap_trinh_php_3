<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;
use Illuminate\Http\Request;

class sinhvienController extends Controller
{
    //
    public function sv(){
        return view('nhapsv');
    }

    public function sv_store(Request $request){
        $request->validate([
            'masv'     => ['required', 'regex:/^PS\d{5}$/'],
            'hoten'    => ['required', 'min:3', 'max:20'],
            'tuoi'     => 'required|integer|min:16|max:100',
            'ngaysinh' => ['required', 'date'],
            'cmnd'     => 'required|digits_between:9,10',
            'email'    => 'required|email|ends_with:@fpt.edu.vn',
        ],[
            'masv.required'     => 'Mã sinh viên không được bỏ trống',
            'masv.regex'         => 'Mã sinh viên phải bắt đầu bằng PS và có 5 chữ số',
            'hoten.required'    => 'Họ tên không được bỏ trống',
            'hoten.min'         => 'Họ tên phải có ít nhất 3 ký tự',
            'hoten.max'         => 'Họ tên phải có tối đa 20 ký tự',
            'tuoi.required'     => 'Tuổi không được bỏ trống',
            'tuoi.integer'      => 'Tuổi phải là số nguyên',
        ]);

        Sinhvien::create([
            'masv'     => $request->masv,
            'hoten'    => $request->hoten,
            'tuoi'     => $request->tuoi,
            'ngaysinh' => $request->ngaysinh,
            'cmnd'     => $request->cmnd,
            'email'    => $request->email,
        ]);

        return redirect()->route('sv')->with('success', 'Thêm sinh viên thành công');
    }

}
