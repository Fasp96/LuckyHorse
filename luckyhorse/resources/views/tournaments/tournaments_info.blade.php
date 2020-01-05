@extends('layouts.head_footer')

@section('content')

<!-- Container of all the tournament information -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$tournaments->name}}</h2></div>
                <div class="card-body">
                    <img class="list_image" src="{{ $tournaments->file_path}}" alt="tournament_img" style="width:50%;opacity:0.85;">
                    
                    <!-- Tournament Information -->
                    Date: {{date('d-m-Y', strtotime($tournaments->date))}}<br>
                    Time: {{date('H:i:s', strtotime($tournaments->date))}}<br>
                    Location: {{$tournaments->location}}<br>
                    <!-- Shows the tournament's winner if there is one -->
                    @if($winner->count() > 0)
                        @if($winner[0]->count() != 7)
                            Winners: {{$winner[0]->horse_name}} and {{$winner[0]->jockey_name}} <br>
                        @endif
                    @endif
                    <br>
                    Description: {{$tournaments->description}}<br>
                    <br>
                    <h3>Races in this tournament:</h3>
                    <ul>
                    <!-- List of races in the tournament -->
                    @if($races->count() > 0)
                        @foreach($races as $race)
                            <li><a href='http://localhost:8000/races/{{$race->id}}'> {{$race->name}} in {{$race->location}} </a></li>
                        @endforeach
                    @else
                        No races for this tournament <br>
                    @endif
                    </ul>  
                    <div>
                        @auth
                            <!-- If the user logged in is an admin he can edit the information -->
                            @if(Auth::user()->role=='admin')
                                <div class="details_button">
                                    <a href="/edit_tournament={{$tournaments->id}}">Edit</a>
                                </div>
                            @endif
                            <!-- If the user logged in and the tournament still hasn't finished the user can bet on it --> 
                            @if($winner[0]->tournament_id == null && $races->count() > 0)
                                <div class="details_button bet_button">
                                    <a href="/add_bet_tournament={{$tournaments->id}}">Bet</a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection