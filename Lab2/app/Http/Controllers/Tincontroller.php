<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Tincontroller extends Controller
{
    //
    public function index(){
        //Tin xem nhiều
        $moreNewss = DB::table('news')
        ->orderBy('views', 'desc')
        ->limit(10)->get();

        //tin mới nhất
        $NewsNews = DB::table('news')
        ->orderBy('created_at', 'desc')
        ->limit(10)->get();

        //danh mục
        $categories = DB::table('categories')->get();

        return view('news', compact('moreNewss', 'NewsNews', 'categories'));
    }

    public function newsCate($id){

        //danh mục
        $categories = DB::table('categories')->get();

        //tin tức theo danh mục
        $newsCates = DB::table('news')
        ->where('category', '=', $id)->get();

        return view('newsCategory', compact('newsCates', 'categories'));
    }

    public function newsDetail($id){
        //danh mục
        $categories = DB::table('categories')->get();

        $newsDetail = DB::table('news')
        ->where('id', '=', $id)
        ->first();

        return view('newsDetail', compact('newsDetail','categories'));
    }

}

