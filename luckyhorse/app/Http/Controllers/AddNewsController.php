<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class AddNewsController extends Controller
{
    //Returns the view to add a news
    public function index(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role == "admin"){
            //Search for the last 10 news added
             $news = News::orderByDesc('created_at')->take(10)->get();

             return view('news.add_news',compact('news'));
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //Creates a news and redirect to the news page
    public function add(Request $request){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Create new news with the parameters from the request
            $news = new News;
            $news->title = $request->title;
            $news->minute_info = $request->abstract;
            $news->description = $request->description;
            
            //Photo file path treatment so it can be saved without problems
            $photo = $request->file('news_photo');
            //saves photo will name-orginial photo name
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            //path to folder to save 
            $path = 'img/news_photo/';
            //saves photo in that folder
            $file = $photo->move($path, $fileName);

            //apends all filepath to photo img/news-photo...
            $file_path = $path . $fileName;
            //adds the file path to the parameter
            $news->file_path = '/' . $file_path;
            $news->save();

            //fetches the id of the new news, adds to the photo name and updates the file_path atribute
            $id = $news->id;
            //creates a new file path but appends the id in the photo name
            $new_file_path = $path . $id . '-' . $fileName;
            
            // renames the photo
            rename($file_path, $new_file_path);
            //updates the file_path
            $news->file_path = '/' . $new_file_path;
            $news->save();

            return redirect('/add_news');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }
}
