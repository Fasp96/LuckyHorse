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
</style>

<!--News-->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$news->title}}</div> 
                    <div class="card-body">
                        <img src="{{$news->file_path}}" alt="news_img" style="width:50%;opacity:0.85;">
                        <br>
                        <div class="news-description">
                            {{$news->description}}
                        </div>
                        <br><br>
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