<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    public function categoryList(){
        //lấy danh sách các category
        $categories = category::all();
        return view('admin/manage-categorys/category-list', compact('categories'));
    }

    public function categoryCreate(){

        return view('admin/manage-categorys/category-create', );
    }


    public function categoryStore(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:3'
        ],[
            'name.required' => 'Tên danh mục không được bỏ trống',
            'name.string' => 'Tên danh mục phải là chuỗi',
            'name.min' => 'Tên danh mục phải có ít nhất 3 ký tự'

        ]);

        category::create([
            'name' => $request->name
        ]);
        return redirect()->route('admin.categoryList')->with('success', 'thêm thành công 1 danh mục');

    }

    public function categoryDelete(Request $request){
        $category = category::find($request->id);
        $category->delete();
        return redirect()->route('admin.categoryList')->with('success', 'xóa thành công 1 danh mục');

    }

    public function categoryEdit($id){
        $category = category::find($id);
        return view('admin/manage-categorys/category-edit', compact('category'));
    }

    public function categoryUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:3'
        ],[
            'name.required' => 'Tên danh mục không được b�� trống',
            'name.string' => 'Tên danh mục phải là chu��i',
            'name.min' => 'Tên danh mục phải có ít nhất 3 ký tự'

        ]);

        $category = category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categoryList')->with('success', 'cập nhật thành công 1 danh mục');
    }
}
