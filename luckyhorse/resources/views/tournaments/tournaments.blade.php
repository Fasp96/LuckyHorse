@extends('layouts.head_footer')

@section('content')

<style>
    img{
        float:right;
    }
    h1{
        color: green;
        font-weight:bold; 
    }
    h2{
        color:#333;
        font-weight:bold;
    }
    h5{
        margin-left: 2em;
    }

    .details_button > a {
        color: white;
        float: left;
        padding: 4px 8px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        border-radius: 11px;
        margin: 0 1px;
        background-color: #333;
    }
    .details_button a:hover {
        background-color: #fa8b1b;
    }
    .bet_button{
        float: right;
    }

</style>

<h1 align="center">Tournaments</h1>

@foreach($tournaments as $tournament) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Tournaments</div> -->
                <div class="card-header"><h2>{{$tournament->name}}</h2></div>
                <div class="card-body">
                    <img src="{{ $tournament->file_path}}" alt="tournament_img" style="width:25%;opacity:0.85;">
                    
                    Date: {{date('d-m-Y', strtotime($tournament->date))}}<br>
                    Time: {{date('H:i:s', strtotime($tournament->date))}}<br>
                    Location: {{$tournament->location}}<br>

                    @foreach($winners as $winner)
                        @if($winner[0]->count() > 2 && $winner[0]->tournament_id==$tournament->id)
                            Winners: {{$winner[0]->horse_name}} and {{$winner[0]->jockey_name}} <br>
                        @endif
                    @endforeach


                    <br>
                    <div class="details_button">
                        <a href="/tournaments/{{$tournament->id}}">View Details</a>
                    </div>
                    @auth
                        @foreach($winners as $winner)
                            @if($winner[0]->count() == 2 && $winner[0]->id==$tournament->id)
                                <div class="details_button bet_button">
                                    <a href="/add_bet_tournament={{$tournament->id}}">Bet</a>
                                </div>
                            @endif
                        @endforeach
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach

@include('layouts.pagination')

@endsection