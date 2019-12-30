<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class AddNewsController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $news = News::all();
             return view('news.add_news',compact('news'));
        }else{
            return redirect('home');
        }
    }

    public function add(Request $request){
        $user = Auth::user();
        if($user){

            $news = new News;
            $news->title = $request->title;
            $news->minute_info = $request->abstract;
            $news->description = $request->description;
            
            $photo = $request->file('news_photo');
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            $path = 'img/news_photo/';
            $file = $photo->move($path, $fileName);

            $file_path = $path . $fileName;
            $news->file_path = '/' . $file_path;
            $news->save();

            //fetches the id of the new news, adds to the photo name and updates the file_path atribute
            $id = $news->id;
            $new_file_path = $path . $id . '-' . $fileName;
            
            rename($file_path, $new_file_path);
            $news->file_path = '/' . $new_file_path;
            $news->save();

            return redirect('/add_news');
        }else{
            return redirect('home');
        }       
    }
}
