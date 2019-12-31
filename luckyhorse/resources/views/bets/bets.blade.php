@extends('layouts.head_footer')

@section('content')

<style>
    h2{
        font-weight:bold; 
    }
    h1{
        font-weight:bold; 
    }
</style>

<h1 align="center">Bets</h1>

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

                    Value: {{$tournament_bet->value}}<br>                

                       
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach

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
                    
                    Value: {{$race_bet->value}}<br>                
                       
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach


@endsection