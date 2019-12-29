@extends('layouts.head_footer')

@section('content')
<style>

img {
  float: right;
}

h2{
    color: red;
    font-weight:bold; 
}
    
h1{
    color: green;
    font-weight:bold; 
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
                            Gender: {{$jockey->gender}}<br> 
                            Number of Races: {{$jockey->num_races}}<br>
                            Number of Victories: {{$jockey->num_victories}}<br>                
                       
                </div>
            </div>
        </div>
    </div>
</div>
<br>
 @endforeach

@endsection