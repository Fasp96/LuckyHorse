<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class NewsController extends Controller
{
    //Returns the view to list all news
    public function index($page_number=1){
        //Pagination variables definition
        $page_name = "news";
        $news_per_page = 4;
        //Fetch all news
        $news_number = News::count();
        //Find the correct number of pages needed for all the news

        //Depending on the page the user wants, select the corresponding news of that page
        $pages_total = ceil($news_number/$news_per_page);
        if($page_number == 1){
            $news = News::orderByDesc('created_at')->take($news_per_page)->get();
        }else{
            $news = News::orderByDesc('created_at')
                ->skip(($page_number-1)*$news_per_page)
                ->take($news_per_page)->get();
        }
        //Verifies that there are news
        if($news)
            return view('news.news',
                compact('news','page_number','pages_total', 'page_name'));
        else   
            //In case the aren't news, redirect to home page
            return redirect('/');
    }

    //Returns the view with the information of the selected jockey
    public function getNews($id){
        $news = News::find($id);
        //Verifies that news exists
        if($news)
            return view('news.news_info',compact('news'));
        else   
            //In case the news doesn't exist, redirect to news list page
            return redirect('/news');
    }
}
