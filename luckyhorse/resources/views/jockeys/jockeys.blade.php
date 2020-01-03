@extends('layouts.head_footer')

@section('content')

<h1 align="center">Jockeys</h1>
@foreach($jockeys as $jockey) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">Jockeys</div> -->
                <div class="card-header"> <h2>{{$jockey->name}}</h2></div>
                <div class="card-body">
                            <img class="list_image" src="{{ $jockey->file_path}}" alt="jockey_img" style="width:20%;opacity:0.85;">
                        
                            Birth Date: {{$jockey->birth_date}}<br>
                            Gender: {{$jockey->gender}}<br><br>
                            
                            <div class="details_button">
                              <a href="/jockeys/{{$jockey->id}}">View Details</a>
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