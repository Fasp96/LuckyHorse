@extends('layouts.head_footer')

@section('content')
<style>
    img {
    float: right;
    }

    table, td {
        border: 2px solid black;
        border-collapse: collapse;
        background-color: #FFE4C4;
}

    th{
        color: white;
        border: 2px solid black;
        border-collapse: collapse;
        background-color: grey;
    }

    h4{
        color: green;
        font-weight:bold;
    }

    h2{
        color: red;
        font-weight:bold; 
    }
    .edit_button > a {
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
    .edit_button a:hover {
        background-color: #fa8b1b;
    }
    .bet_button{
        float: right;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                   <div class="card-header"> <h2>{{$results[0]->name}}</h2></div>  

                    <div id="body-card">
                        <div class="card-body">
                            <img src="{{ $results[0]->file_path}}" alt="race_img" style="width:40%;opacity:0.85;">
                            
                            Date: {{date('d-m-Y', strtotime($results[0]->date))}}<br>
                            Time: {{date('H:i:s', strtotime($results[0]->date))}}<br>
                            Description: {{$results[0]->description}}<br>
                            Local: {{$results[0]->location}}<br>
                            @isset($results[0]->tournament_name)
                                Tournament: {{$results[0]->tournament_name}}<br>
                            @endif
                            <br>
                            <!--   -------------devolve os cavalos de cada corrida----------------    -->
                            <h3>Horses in this race: </h3>
                            <ul>  
                            @foreach($results as $result)
                                <li><a href='/horses/{{$result->horse_id}}'>{{$result->horse_name}}</a></li>
                            @endforeach
                            </ul>
                            
                            <!-- -------------------  devolve os jockeys de cada corrida -------------------------- -->
                            <h3>Jockeys in this race: </h3>
                            <ul>  
                            @foreach($results as $result)
                                <li><a href='/jockeys/{{$result->jockey_id}}'>{{$result->jockey_name}}</a></li>
                            @endforeach
                            </ul>

                            <!-- -------------------  devolve os resultados de cada corrida -------------------------- -->
                            <h3>Results: </h3>
                            <table style="width:60%">
                                <tr>
                                    <th>Win Prob</th>
                                    <th>Horse</th>
                                    <th>Jockey</th> 
                                    <th>Time</th>
                                </tr>
                                @foreach($results as $result)
                                    <tr>
                                        @foreach($scores as $score)
                                            @if($score->horse_id==$result->horse_id)
                                                <td>{{($score->wr/$win_total)}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$result->horse_name}}</td>
                                        <td>{{$result->jockey_name}}</td>
                                        @isset($result->time)
                                            <td>{{$result->time}}</td>
                                        @else
                                            <td>00:00:00</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                            <br>
                            <!-- --------------------- devolve o vencedor de cada corrida ------------------------ -->
                            @isset($winner[0]->time)
                                <h4 align="center">{{$winner[0]->jockey_name}} and {{$winner[0]->horse_name}} with a best time: 
                                {{$winner[0]->time}}</h4>
                            @endif

                            <div>
                                @if(Auth::user()->role=='admin')
                                    <div class="edit_button">
                                        <a href="/edit_race={{$results[0]->id}}">Edit</a>
                                    </div>
                                @endif  
                                @auth
                                    <div class="edit_button bet_button">
                                        <a href="/add_bet_race={{$results[0]->id}}">Bet</a>
                                    </div>
                                @endauth
                            </div>
                            <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection