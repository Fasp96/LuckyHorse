@extends('layouts.head_footer')

@section('content')

@if($tournament_bets->count() == 0 && $race_bets->count() == 0)
    <h1 align="center">No Bets Currently</h1><br>
@endif

@if($tournament_bets->count()>0)
    <h1 align="center">Tournament Bets</h1>
@endif
@foreach($tournament_bets as $tournament_bet) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>Bet ID: {{$tournament_bet->bet_id}}</h2></div>
                <div class="card-body">

                    Tournament Name: {{$tournament_bet->tournament_name}}<br>
                    Date: {{date('d-m-Y', strtotime($tournament_bet->date))}}<br>
                    Horse Name: {{$tournament_bet->horse_name}}<br>
                    Jockey Name: {{$tournament_bet->jockey_name}}<br>

                    Value: {{$tournament_bet->value}}€<br>
                    @foreach($winners_tournament_bets as $win)
                        @if($win->tournament_id == $tournament_bet->tournament_id)
                            @if($win->time !=null)
                                @if($win->jockey_id == $tournament_bet->jockey_id&& $win->horse_id == $tournament_bet->horse_id)
                                    <div class="edit_button">
                                        <a href="/claim={{$tournament_bet->bet_id}}">Claim Money</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach

@if($race_bets->count()>0)
    <h1 align="center">Race Bets</h1>
@endif
@foreach($race_bets as $race_bet) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>Bet ID: {{$race_bet->bet_id}}</h2></div>
                <div class="card-body">

                    Race Name: {{$race_bet->race_name}}<br>
                    Date: {{date('d-m-Y', strtotime($race_bet->date))}}<br>
                    Horse Name: {{$race_bet->horse_name}}<br>
                    Jockey Name: {{$race_bet->jockey_name}}<br>
                    
                    Value: {{$race_bet->value}}€<br> 
                    
                    @foreach($winners_race_bets as $win)
                        @if($win->race_id == $race_bet->race_id)
                            @if($win->time !=null)
                                @if($win->jockey_id == $race_bet->jockey_id && $win->horse_id == $race_bet->horse_id)
                                    <div class="edit_button">
                                        <a href="/claim={{$race_bet->bet_id}}">Claim Money</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                       
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach

@include('layouts.pagination')

@endsection