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

 
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> <h2>{{$jockeys->name}}</h2></div>
        <div class="card-body">
          <img src="{{ $jockeys->file_path}}" alt="jockey_img" style="width:50%;opacity:0.85;">
      
          Birth Date: {{$jockeys->birth_date}}<br>
          Gender: {{$jockeys->gender}}<br> 
          Number of Races: {{$jockeys->num_races}}<br>
          Number of Victories: {{$jockeys->num_victories}}<br>
          Win Rate: {{round(($jockeys->num_victories/$jockeys->num_races)*100,2)}}%<br><br>  

           @auth
            @if(Auth::user()->role=='admin')
              <div class="edit_button">
                <a href="/edit_jockey={{$jockeys->id}}">Edit</a>
              </div>
            @endif
          @endauth          
                  
        </div>
      </div>
    </div>
  </div>
</div>
<br>


@endsection