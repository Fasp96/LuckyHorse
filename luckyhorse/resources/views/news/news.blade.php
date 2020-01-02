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
  .details_button{
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
  }
  .details_button > a {
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
  .details_button a:hover {
    background-color: #fa8b1b;
  }
  h2{
    color: #333;
    font-weight:bold; 
  }
</style>

<!--News-->
@foreach($news as $new)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{$new->title}}</h2></div> 
                    <div class="card-body">
                        <img src="{{$new->file_path}}" alt="news_img" style="width:50%;opacity:0.85;">
                        <br>
                        
                        <div class="details_button">
                          <a href="/news/{{$new->id}}">Read More</a>
                        </div>

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
