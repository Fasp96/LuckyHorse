<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class EditNewsController extends Controller
{
    //Returns the view to edit a news
    public function editNews($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $news = News::find($id);
            //Verifies that the news exists
            if($news){
                return view('news.edit_news',compact('news'));
            }else{
                //In case the news doesn't exist, redirect to news list page
                return redirect('/news');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

    //Update news with the new values
    public function updateNews(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $news = News::find($id);
            //Verifies that the news exists
            if($news){
                //Update news
                $news->title = $request->title;
                $news->minute_info = $request->abstract;
                $news->description = $request->description;

                //Update news photo file path if is not null
                if($request->file('news_photo') != null){
                    //gets file
                    $photo = $request->file('news_photo');
                    //path to folder to save 
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    //saves photo will id-name-orginial photo name
                    $path = 'img/news_photo/';
                    //saves photo in that folder
                    $file = $photo->move($path, $fileName);
                    //apends all filepath to photo img/news-photo...
                    $file_path = $path . $fileName;
                    //adds the file path to the parameter
                    $news->file_path = '/' . $file_path;
                }
                $news->save();

                return redirect('/news/' . $id);
            }else{
                //In case the news doesn't exist, redirect to news list page
                return redirect('/news');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
