<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\news;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;


class Tincontroller extends Controller
{

    //
    public function index(){
        //Tin xem nhiều
        $moreNewss = news::orderBy('views', 'desc')->limit(10)->get();

        //tin mới nhất
        $NewsNews = news::orderBy('created_at', 'desc')->limit(10)->get();

        return view('news', compact('moreNewss', 'NewsNews'));
    }

    public function newsCate($id){
        //tin tức theo danh mục
        $news = DB::table('news')->where('category', '=', $id)->get();
        $category = category::find($id);
        return view('newsCategory', compact('news','category'));
    }

    public function newsDetail($id){

        $newsDetail = news::find($id);

        return view('newsDetail', compact('newsDetail'));
    }

    public function newsSearch(HttpRequest $request){
        $category = ['name' => $request->input('keyword')];
        $keyword = $request->input('keyword');
        $news = News::where('title', 'like', "%$keyword%")->get();
        return view('newsCategory', compact('news','category'));
    }

}

