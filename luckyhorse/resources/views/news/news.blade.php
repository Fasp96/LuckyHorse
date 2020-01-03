@extends('layouts.head_footer')

@section('content')

<!--News-->
@foreach($news as $new)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{$new->title}}</h2></div> 
                    <div class="card-body">
                        <img class="news_image" src="{{$new->file_path}}" alt="news_img" style="width:50%;opacity:0.85;">
                        <br>
                        
                        <div class="read_button">
                          <a href="/news/{{$new->id}}">Read More</a>
                        </div>

                        <div class="news_date">
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
