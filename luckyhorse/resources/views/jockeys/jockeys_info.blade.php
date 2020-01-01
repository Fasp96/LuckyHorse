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
          Win Rate: {{($jockeys->num_victories/$jockeys->num_races)*100}}%<br>               
                  
        </div>
      </div>
    </div>
  </div>
</div>
<br>


@endsection