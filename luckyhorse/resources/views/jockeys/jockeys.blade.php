@extends('layouts.head_footer')

@section('content')

<h1>Jockeys</h1>

<!-- Containers with basic information from a jockey -->
@foreach($jockeys as $jockey) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>{{$jockey->name}}</h2></div>
                <div class="card-body">

                    <!-- Image and basic information of the jockey -->
                    <img class="list_image" src="{{ $jockey->file_path}}" alt="jockey_img" style="width:20%;opacity:0.85;">
                    Birth Date: {{$jockey->birth_date}}<br>
                    Gender: {{$jockey->gender}}<br><br>
                    
                    <!-- Button to see all jockey details -->
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

<!-- Layout to permit pagination -->
@include('layouts.pagination')

@endsection