<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class NewsController extends Controller
{
    public function index(){
        //$current_user = Auth::user();
        $news = News::orderByDesc('created_at')->take(10)->get();
        return view('news.news',compact('news')); 
    }

    public function showNews($id){
        //$current_user = Auth::user();
        $news = News::find($id);
        if($news)
            return view('news.news_info',compact('news'));
        else   
            return redirect('/news');
    }
}
