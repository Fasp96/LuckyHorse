@extends('layouts.app')

@section('content')

<h1 align="center">Races</h1>

@foreach($races as $race) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Races</div>

                <div class="card-body">
                        
                            <p>data: {{$race->date}}</p> 
                            <p>local: {{$race->local}}</p>
                            <p>torneio: {{$race->tournament_id}}</p>                  
                       
                </div>
            </div>
        </div>
    </div>
</div>
 @endforeach

@endsection