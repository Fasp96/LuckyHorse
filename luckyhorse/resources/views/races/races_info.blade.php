@extends('layouts.head_footer')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>{{$results[0]->name}}</h2></div>
                <div id="body-card">
                    <div class="card-body">
                        <img class="list_image" src="{{ $results[0]->file_path}}" alt="race_img" style="width:50%;opacity:0.85;">
                        
                        Date: {{date('d-m-Y', strtotime($results[0]->date))}}<br>
                        Time: {{date('H:i:s', strtotime($results[0]->date))}}<br>
                        Location: {{$results[0]->location}}<br>
                        @isset($results[0]->tournament_name)
                            Tournament: {{$results[0]->tournament_name}}<br>
                        @endif
                        <br>
                        Description: {{$results[0]->description}}<br>
                        
                        
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
                        <table id="race_results_table" style="width:60%">
                            <tr>
                                <th>Win Prob</th>
                                <th>Horse</th>
                                <th>Jockey</th> 
                                <th>Time</th>
                                @auth
                                    @if(Auth::user()->role=='admin')
                                        <th> </th>
                                    @endif
                                @endauth
                                </tr>
                            @foreach($results as $result)
                                <tr>
                                    @foreach($scores as $score)
                                        @if($score->horse_id==$result->horse_id)
                                            <td>{{round(($score->wr/$win_total),2)}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$result->horse_name}}</td>
                                    <td>{{$result->jockey_name}}</td>
                                    @isset($result->time)
                                        <td>{{$result->time}}</td>
                                    @else
                                        <td>00:00:00</td>
                                    @endif 
                                    @auth
                                        @if(Auth::user()->role=='admin')
                                            <td>
                                                <div class="details_button">
                                                    <a href="/edit_results={{$result->id}}">Edit Result</a>
                                                </div>
                                            </td>
                                        @endif
                                    @endauth
                                </tr>
                            @endforeach
                        </table>
                        <br>

                        <!-- --------------------- devolve o vencedor de cada corrida ------------------------ -->
                        @isset($winner->time)
                            <h4 align="center">{{$winner->horse_name}} and {{$winner->jockey_name}} with a best time: 
                            {{$winner->time}}</h4>
                        @endif
                        <div>
                            @auth
                                @if(Auth::user()->role=='admin')
                                    <div class="details_button">
                                        <a href="/edit_race={{$results[0]->race_id}}">Edit Race</a>
                                    </div>
                                @endif  
                                @if(!isset($winner->time))
                                    <div class="details_button bet_button">
                                        <a href="/add_bet_race={{$results[0]->race_id}}">Bet</a>
                                    </div>
                                @endif
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