<?php

namespace App\Http\Controllers;

use App\Models\loaiTin;
use App\Models\tin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TinController extends Controller
{
    //
    public function index() {
        $tins = tin::all();

        return view('Tin/danhsach', compact('tins'));
    }

    public function them() {
        $loaiTins = loaiTin::all();
        return view('Tin/themtin', compact('loaiTins'));
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate(
            [
                'tieuDe' => 'required|string|max:255',
                'tomTat' => 'nullable|string|max:500',
                'urlHinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'noiDung' => 'required|string|min:20',
                'idLT' => 'required|integer|exists:loai_tins,id',
                'tags' => 'nullable|string',
                'noiBat' => 'nullable|boolean',
                'anHien' => 'required|boolean',
            ], [
                // Thông báo lỗi tùy chỉnh
                'tieuDe.required' => 'Tiêu đề không được để trống.',
                'tieuDe.unique' => 'Tiêu đề này đã tồn tại.',
                'noiDung.required' => 'Nội dung không được để trống.',
                'noiDung.min' => 'Nội dung phải có ít nhất 20 ký tự.',
                'urlHinh.url' => 'Hình ảnh phải là một URL hợp lệ.',
                'idLT.exists' => 'Loại tin không hợp lệ.',
            ]
        );


        // if ($request->hasFile('urlHinh')) {
        //     $file = $request->file('urlHinh');
        //     $imageName = time() . '.' . $file;
        //     $file->move(public_path('uploads/tin/'), $imageName); // Lưu ảnh vào thư mục
        // } else {
        //     $imageName = null; // Không có ảnh
        // }

        $imageName = $request->file('urlHinh')->store('images', 'public');

        tin::create([
            'tieuDe' => $request->tieuDe,
            'tomTat' => $request->tomTat,
            'urlHinh' => $imageName,
            'noiDung' => $request->noiDung,
            'idLT' => $request->idLT,
            'tags' => $request->tags,
            'noiBat' => $request->noiBat,
            'anHien' => $request->anHien,
        ]);



        return redirect()->route('tin.list')->with('success','Thêm thành công 1 sản phẩm');

    }

    public function delete(Request $request){
        $id = $request->id;
        $tin = tin::find($id);
        $image =
        File::delete($tin->urlHinh);
        tin::destroy($id);

        return redirect()->route('tin.list')->with('success','Xóa thành công');
    }

    public function edit($id) {
        $tin = tin::find($id);
        $loaiTins = loaiTin::all();
        return view('Tin/suatin', compact('tin', 'loaiTins'));
    }

    public function update(Request $request) {
        // dd($request->all());
        $request->validate(
            [
                'tieuDe' => 'required|string|max:255',
                'tomTat' => 'nullable|string|max:500',
                'urlHinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'noiDung' => 'required|string|min:20',
                'idLT' => 'required|integer|exists:loai_tins,id',
                'tags' => 'nullable|string',
                'noiBat' => 'nullable|boolean',
                'anHien' => 'required|boolean',
            ], [
                // Thông báo lỗi tùy chỉnh
                'tieuDe.required' => 'Tiêu đề không được để trống.',
                'tieuDe.unique' => 'Tiêu đề này đã tồn tại.',
                'noiDung.required' => 'Nội dung không được để trống.',
                'noiDung.min' => 'Nội dung phải có ít nhất 20 ký tự.',
                'urlHinh.url' => 'Hình ảnh phải là một URL hợp lệ.',
                'idLT.exists' => 'Loại tin không hợp lệ.',
            ]
        );

        // $tin = tin::findOrFail($request->id);

        tin::where('id', $request->id)->update([

            'tieuDe' => $request->tieuDe,
            'tomTat' => $request->tomTat,
            'urlHinh' => $request->urlHinh,
            'noiDung' => $request->noiDung,
            'idLT' => $request->idLT,
            'tags' => $request->tags,
            'noiBat' => $request->noiBat??0,
            'anHien' => $request->anHien,
        ]);
        return redirect()->route('tin.list')->with('success','Sửa thành công 1 sản phẩm');

    }
}
