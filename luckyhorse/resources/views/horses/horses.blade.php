@extends('layouts.app')

@section('content')


<h1 align="center">Horses</h1>
@foreach($horses as $horse)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white" >
            <img class="card-img" src={{ asset('img/horse-galloping.jpg')}} alt="Card image" height="250" >
             
                <div class="card-img-overlay">
                            <p>name: {{$horse->name}}</p>
                            <p>breed: {{$horse->breed}}</p>
                            <p>birth_date: {{$horse->birth_date}}</p>
                            <p>gender: {{$horse->gender}}</p>
                            <p>number of races: {{$horse->num_races}}</p>
                            <p>number of victories: {{$horse->num_victories}}</p>
                
                </div>

            </div>
        </div>
    </div>
</div>

@endforeach

@endsection