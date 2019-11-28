@extends('layouts.head_footer')

@section('content')

<h1 align="center">Tournaments</h1>

@foreach($tournaments as $tournament) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tournaments</div>

                <div class="card-body">
                        
                            <p>name: {{$tournament->name}}</p>                  
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection