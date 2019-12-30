<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class NewsController extends Controller
{
    public function index($page_number=1){
        //$current_user = Auth::user();
        $page_name = "news";
        $news_per_page = 4;
        $news_number = News::count();
        $pages_total = ceil($news_number/$news_per_page);
        if($page_number == 1){
            $news = News::orderByDesc('created_at')->take($news_per_page)->get();
        }else{
            $news = News::orderByDesc('created_at')
                ->skip(($page_number-1)*$news_per_page)
                ->take($news_per_page)->get();
        }
        if($news)
            return view('news.news',
                compact('news','page_number','pages_total', 'page_name'));
        else   
            return redirect('/news');
    }

    public function getNews($id){
        //$current_user = Auth::user();
        $news = [News::find($id)];
        $page_number = 1;
        $pages_total = 1;
        if($news)
            return view('news.news',compact('news', 'page_number','pages_total'));
        else   
            return redirect('/news');
    }
}
