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
    public function index()
    {
        //Tin xem nhiều
        $moreNewss = news::orderBy('views', 'desc')->limit(10)->get();

        //tin mới nhất
        $NewsNews = news::orderBy('created_at', 'desc')->limit(10)->get();

        return view('client/news', compact('moreNewss', 'NewsNews'));
    }

    public function newsCate($id)
    {
        //tin tức theo danh mục
        $news = DB::table('news')->where('category', '=', $id)->get();
        $category = category::find($id);
        return view('client/newsCategory', compact('news', 'category'));
    }

    public function newsDetail($id)
    {

        $newsDetail = news::find($id);

        return view('client/newsDetail', compact('newsDetail'));
    }

    public function newsSearch(HttpRequest $request)
    {
        $category = ['name' => $request->input('keyword')];
        $keyword = $request->input('keyword');
        $news = News::where('title', 'like', "%$keyword%")->get();
        return view('client/newsCategory', compact('news', 'category'));
    }

    public function newsList()
    {
        $news = news::all();
        return view('admin/manage-news/list-news', compact('news'));
    }

    public function newsCreate()
    {
        $categories = category::all();
        return view('admin/manage-news/create-news', compact('categories'));
    }

    public function newsStore(HttpRequest $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:500',
            'description_short' => 'required|string|max:1000',
            'description' => 'required|string|max:10000',
            'image' => 'required|mimes:jpg,png,jpeg,gif,webp|max:1000',
            'views' => 'integer|max:11',
            'category' => 'required|integer|max:11',
        ]);

        // $imageName = $request->file('image')->store('image','public');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName(); // Lấy tên gốc của file
            $file->move(public_path('img/'), $imageName); // Lưu ảnh vào thư mục public/img/
        } else {
            $imageName = null;
        }

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

    public function newsDelete(HttpRequest $request)
    {
        // dd($request->all());
        $news = news::find($request->id);
        $filePath = public_path('img/' . $news->image); // Đường dẫn đầy đủ

        if (File::exists($filePath)) {
            File::delete($filePath); // Xóa file
        }
        news::destroy($request->id);
        return redirect()->route('admin.newsList')->with('success', 'Xóa tin tức thành công');
    }

    public function newsEdit($id)
    {
        $categories = category::all();
        $newsDetail = news::find($id);
        return view('admin/manage-news/edit-news', compact('categories', 'newsDetail'));
    }

    public function newsUpdate(HttpRequest $request)
    {
        // dd($request->all());
        $news = news::find($request->id);

        $request->validate([
            'title' => 'required|string|max:500',
            'description_short' => 'required|string|max:1000',
            'description' => 'required|string|max:10000',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,webp|max:10000',
            'views' => 'integer|min:0|max:1000000',
            'category' => 'required|integer|min:1',
        ]);
        // dd($news);
        if ($request->hasFile('image')) {
            // dd($request->file('image'));
            if ($news->image) {
                $filePath = 'img/'.$news->image;
                File::delete($filePath);
            }
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img/'), $imageName);


        } else {
            $imageName = $news->image;
        }

        news::where('id', $request->id)->update([
            'title' => $request->title,
            'description_short' => $request->description_short,
            'description' => $request->description,
            'image' => $imageName,
            'views' => $request->views,
            'category' => $request->category,
        ]);
        return redirect()->route('admin.newsList')->with('success', 'Cập nhật thành công!');
    }
}
