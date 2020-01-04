@extends('layouts.head_footer')

@section('content')

 <!-- Container of all the jockey information -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> <h2>{{$jockeys->name}}</h2></div>
        <div class="card-body">
          <img class="list_image" src="{{ $jockeys->file_path}}" alt="jockey_img" style="width:50%;opacity:0.85;">
      
          <!-- jockey Information -->
          Birth Date: {{$jockeys->birth_date}}<br>
          Gender: {{$jockeys->gender}}<br> 
          Number of Races: {{$jockeys->num_races}}<br>
          Number of Victories: {{$jockeys->num_victories}}<br>
          Win Rate: {{round(($jockeys->num_victories/$jockeys->num_races)*100,2)}}%<br><br>  

          <!-- If the user logged in is an admin he can edit the information -->
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