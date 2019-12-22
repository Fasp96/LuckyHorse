@extends('layouts.head_footer')

@section('content')

<h1 align="center">Races</h1>

@foreach($races as $race) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Races</div>

                <div class="card-body">
                        
                            <p>date: {{$race->date}}</p> 
                            <p>local: {{$race->local}}</p>
                            <p>tournament: {{$race->tournament_id}}</p>  
                            <!--     <p>tournament: {{$race->tournament_id}}</p>
                           <p>horses: {{$horse_names}}</p>
                            <p>jockeys: {{$jockey_names}}  </p>              -->                
                       
                </div>
            </div>
        </div>
    </div>
</div>
 @endforeach

@endsection