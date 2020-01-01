
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
    color: #333;
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





<h1 align="center">Horses</h1>
@foreach($horses as $horse)
                    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">Jockeys</div> -->
               <div class="card-header"> <h2>{{$horse->name}}</h2></div>
                <div class="card-body">
                          <img src="{{ $horse->file_path}}" alt="horse_img" style="width:25%;opacity:0.85;">
                            
                            Birth Date: {{$horse->birth_date}}<br>
                            Gender: {{$horse->gender}}<br><br>
                            <div class="details_button">
                              <a href="/horses/{{$horse->id}}">View More Details</a>
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

