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
                    <div class="card-header"> <h2>{{$horses->name}}</h2></div>
                    <div class="card-body">
                        <img src="{{ $horses->file_path}}" alt="horse_img" style="width:50%;opacity:0.85;">
                        
                        Breed: {{$horses->breed}}<br>
                        Birth Date: {{$horses->birth_date}}<br>
                        Gender: {{$horses->gender}}<br>
                        Number of Races: {{$horses->num_races}}<br>
                        Number of Victories: {{$horses->num_victories}}<br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection