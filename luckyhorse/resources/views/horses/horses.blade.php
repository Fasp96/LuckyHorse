@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Horses</div>

                <div class="card-body">
                    <ul>
                        @foreach($horses as $horse) 
                            <li>{{$horse->name}} - {{$horse->birth_date}}</li>                    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection