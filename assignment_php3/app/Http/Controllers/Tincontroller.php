<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\news;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Tincontroller extends Controller
{

    //
    public function index(){
        //Tin xem nhiều
        $moreNewss = news::orderBy('views', 'desc')->limit(10)->get();

        //tin mới nhất
        $NewsNews = news::orderBy('created_at', 'desc')->limit(10)->get();

        return view('client/news', compact('moreNewss', 'NewsNews'));
    }

    public function newsCate($id){
        //tin tức theo danh mục
        $news = DB::table('news')->where('category', '=', $id)->get();
        $category = category::find($id);
        return view('client/newsCategory', compact('news','category'));
    }

    public function newsDetail($id){

        $newsDetail = news::find($id);

        return view('client/newsDetail', compact('newsDetail'));
    }

    public function newsSearch(HttpRequest $request){
        $category = ['name' => $request->input('keyword')];
        $keyword = $request->input('keyword');
        $news = News::where('title', 'like', "%$keyword%")->get();
        return view('client/newsCategory', compact('news','category'));
    }

    public function newsList(){
        $news = news::all();
        return view('admin/manage-news/list-news', compact('news'));
    }

    public function newsCreate(){
        $categories = category::all();
        return view('admin/manage-news/create-news', compact('categories'));
    }

    public function newsStore(HttpRequest $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:500',
            'description_short' => 'required|string|max:1000',
            'description' => 'required|string|max:10000',
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:1000',
            'views' => 'integer|max:11',
            'category' => 'required|integer|max:11',
        ]);

        $imageName = $request->file('image')->store('image','public');

        news::create([
            'title' => $request->title,
            'description_short' => $request->description_short,
            'description' => $request->description,
            'image' => $imageName,
            'views' => $request->views,
            'category' => $request->category,
        ]);
        return redirect()->route('admin.newsList')->with('success', 'Thêm tin tức thành công');
    }

    public function newsDelete(HttpRequest $request){
        // dd($request->all());
        $news = news::find($request->id);
        Storage::disk('public')->delete($news->image);
        news::destroy($request->id);
        return redirect()->route('admin.newsList')->with('success', 'Xóa tin tức thành công');
    }
}

