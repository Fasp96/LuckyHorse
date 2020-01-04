
@extends('layouts.head_footer')

@section('content')

<h1>Horses</h1>

<!-- Containers with basic information from a horse -->
@foreach($horses as $horse)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <div class="card-header"> <h2>{{$horse->name}}</h2></div>
                <div class="card-body">

                    <!-- Image and basic information of the horse -->
                    <img class="list_image" src="{{ $horse->file_path}}" alt="horse_img" style="width:25%;opacity:0.85;">
                    Birth Date: {{$horse->birth_date}}<br>
                    Gender: {{$horse->gender}}<br><br>

                    <!-- Button to see all horse details -->
                    <div class="details_button">
                        <a href="/horses/{{$horse->id}}">View Details</a>
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

