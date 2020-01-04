<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class EditNewsController extends Controller
{
    public function editNews($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $news = News::find($id);
            if($news){
                return view('news.edit_news',compact('news'));
            }else{
                return redirect('/news');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

    public function updateNews(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $news = News::find($id);
            if($news){
                $news->title = $request->title;
                $news->minute_info = $request->abstract;
                $news->description = $request->description;

                if($request->file('news_photo') != null){
                    $photo = $request->file('news_photo');
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    $path = 'img/news_photo/';
                    $file = $photo->move($path, $fileName);
                    $file_path = $path . $fileName;
                    $news->file_path = '/' . $file_path;
                }
                $news->save();

                return redirect('/news/' . $id);
            }else{
                return redirect('/news');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
