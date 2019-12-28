@extends('layouts.head_footer')

@section('content')

<style>
  img{
      float: right;
  }
</style>

<h1 align="center">News</h1>
    @foreach($news as $new)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> {{$new->titulo}}</div> 
                        <div class="card-body">
                            <img src="{{$new->file_path}}" alt="news_img" style="width:50%;opacity:0.85;">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<br>
    

<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, ipsam corrupti expedita quasi recusandae neque dolor consequuntur corporis nisi ullam iure maiores, dolore mollitia soluta impedit numquam odit libero. Ratione?</p>

@endsection
