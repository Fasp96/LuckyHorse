@extends('layouts.head_footer')

@section('content')

<style>
    .card-body > img{
        display: block;
        margin: 0 auto;
    }
    .news-description{
        hyphens: auto;
        overflow-wrap: break-word;
        text-align: justify;
    }
    .news-date{
        text-align: right;
        font-size: 0.7rem;
    }
    h2{
        color: #333;
        font-weight:bold; 
    }
    .edit_button{
        display: flex;
        align-items: center;
        padding: 5px;
    }
    .edit_button > a {
        color: white;
        float: left;
        padding: 4px 8px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        border-radius: 11px;
        margin: 0 1px;
        background-color: #333;
    }
    .edit_button a:hover {
        background-color: #fa8b1b;
    }
</style>

<!--News-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$news->title}}</h2></div> 
                <div class="card-body">
                    <img src="{{$news->file_path}}" alt="news_img" style="width:50%;opacity:0.85;">
                    <br>
                    <div class="news-description">
                        {{$news->description}}
                    </div>
                    <br><br>
                    @if(Auth::user()->role=='admin')
                        <div class="edit_button">
                        <a href="/news/{{$news->id}}">Edit</a>
                        </div>
                    @endif
                    <div class="news-date">
                        Posted at {{$news->created_at->format('d-m-Y')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<br>

@endsection