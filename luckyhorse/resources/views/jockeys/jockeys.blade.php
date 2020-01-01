@extends('layouts.head_footer')

@section('content')
<style>
  img {
    float: right;
  }
  h2{
    color: #333;
    font-weight:bold; 
  }
  h1{
    color: green;
    font-weight:bold; 
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
</style>

<h1 align="center">Jockeys</h1>
@foreach($jockeys as $jockey) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">Jockeys</div> -->
                <div class="card-header"> <h2>{{$jockey->name}}</h2></div>
                <div class="card-body">
                            <img src="{{ $jockey->file_path}}" alt="jockey_img" style="width:20%;opacity:0.85;">
                        
                            Birth Date: {{$jockey->birth_date}}<br>
                            Gender: {{$jockey->gender}}<br><br>
                            
                            <div class="details_button">
                              <a href="/jockeys/{{$jockey->id}}">View More Details</a>
                            </div>               
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach

@include('layouts.pagination')

@endsection