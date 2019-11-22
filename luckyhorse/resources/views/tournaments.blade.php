@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tournaments</div>

                <div class="card-body">
                    <ul>
                        @foreach($tournaments as $tournament) 
                            <li>{{$tournament->name}} - {{$tournament->age}}</li>                    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection