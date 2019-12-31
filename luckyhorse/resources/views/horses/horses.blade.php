
@extends('layouts.head_footer')

@section('content')



<style>
  img {
    float: right;
  }
  h1{
    color: green;
    font-weight:bold; 
  }
  h3{
    color: white;
  }
  
  h2{
    color: red;
    font-weight:bold; 
  }

</style>





<h1 align="center">Horses</h1>
@foreach($horses as $horse)
                    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">Jockeys</div> -->
               <div class="card-header"> <h2>{{$horse->name}}</h2></div>
                <div class="card-body">
                          <img src="{{ $horse->file_path}}" alt="horse_img" style="width:30%;opacity:0.85;">
                            
                            Breed: {{$horse->breed}}<br>
                            Birth Date: {{$horse->birth_date}}<br>
                            Gender: {{$horse->gender}}<br>
                            Number of Races: {{$horse->num_races}}<br>
                            Number of Victories: {{$horse->num_victories}}<br>               
                       
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endforeach

@include('layouts.pagination')

@endsection

