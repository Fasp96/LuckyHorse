@extends('layouts.head_footer')

@section('content')

<!-- Container of all the news information -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$news->title}}</h2></div> 
                <div class="card-body">
                    <!-- News image and information -->
                    <img class="news_image" src="{{$news->file_path}}" alt="news_img" style="width:50%;opacity:0.85;">
                    <br>
                    <div class="news_description">
                        {{$news->description}}
                    </div>
                    <br><br>
                    <!-- If the user logged in is an admin he can edit the information -->
                    @auth
                        @if(Auth::user()->role=='admin')
                            <div class="edit_button">
                                <a href="/edit_news={{$news->id}}">Edit</a>
                            </div>
                        @endif
                    @endauth
                    <!-- Date the news was created -->
                    <div class="news_date">
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