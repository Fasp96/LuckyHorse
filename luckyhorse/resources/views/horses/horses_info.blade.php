@extends('layouts.head_footer')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h2>{{$horses->name}}</h2></div>
                    <div class="card-body">
                        <img class="list_image" src="{{ $horses->file_path}}" alt="horse_img" style="width:50%;opacity:0.85;">
                        
                        Breed: {{$horses->breed}}<br>
                        Birth Date: {{$horses->birth_date}}<br>
                        Gender: {{$horses->gender}}<br>
                        Number of Races: {{$horses->num_races}}<br>
                        Number of Victories: {{$horses->num_victories}}<br>              
                        Win Rate: {{round(($horses->num_victories/$horses->num_races)*100,2)}}%<br><br>

                        @auth
                            @if(Auth::user()->role=='admin')
                            <div class="edit_button">
                                <a href="/edit_horse={{$horses->id}}">Edit</a>
                            </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection