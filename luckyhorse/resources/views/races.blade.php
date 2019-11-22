@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Races</div>

                <div class="card-body">
                    <ul>
                        @foreach($races as $race) 
                            <li>{{$race->name}} - {{$race->age}}</li>                    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection