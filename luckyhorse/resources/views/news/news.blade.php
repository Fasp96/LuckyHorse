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
@foreach($news as $new)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$new->title}}</div> 
                    <div class="card-body">
                        <img src="{{$new->file_path}}" alt="news_img" style="width:50%;opacity:0.85;">
                        <br>
                        <div class="news-description">
                            {{$new->description}}
                        </div>
                        <br><br>
                        <div class="news-date">
                            Posted at {{$new->created_at->format('d-m-Y')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endforeach
<br>

@include('layouts.pagination')

@endsection
