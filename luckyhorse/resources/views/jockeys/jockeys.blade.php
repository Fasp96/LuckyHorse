@extends('layouts.head_footer')

@section('content')


<h1 align="center">Jockeys</h1>
@foreach($jockeys as $jockey) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">Jockeys</div> -->

                <div class="card-body">
                        
                            name: {{$jockey->name}}<br>
                            birth date: {{$jockey->birth_date}}<br>
                            gender: {{$jockey->gender}}<br> 
                            number of races: {{$jockey->num_races}}<br>
                            number of victories: {{$jockey->num_victories}}<br>                
                       
                </div>
            </div>
        </div>
    </div>
</div>
<br>
 @endforeach

@endsection