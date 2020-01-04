@extends('layouts.head_footer')

@section('content')

<!-- Containers with basic information from a news -->
@foreach($news as $new)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{$new->title}}</h2></div> 
                    <div class="card-body">

                        <!-- Image and basic information of the news -->
                        <img class="news_image" src="{{$new->file_path}}" alt="news_img" style="width:50%;opacity:0.85;"><br>
                        <div class="read_button">
                          <a href="/news/{{$new->id}}">Read More</a>
                        </div>

                        <!-- Date the news was created -->
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

<!-- Layout to permit pagination -->
@include('layouts.pagination')

@endsection
