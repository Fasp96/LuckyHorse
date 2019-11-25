@extends('layouts.head_footer')

@section('content')


<h1 align="center">Jockeys</h1>
@foreach($jockeys as $jockey) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jockeys</div>

                <div class="card-body">
                        
                            <p>name: {{$jockey->name}}</p> 
                            <p>birth date: {{$jockey->birth_date}}</p>
                            <p>gender: {{$jockey->gender}}</p>                  
                       
                </div>
            </div>
        </div>
    </div>
</div>
 @endforeach

@endsection