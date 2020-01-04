@extends('layouts.head_footer')

@section('content')

<!-- Container of all the race information -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>{{$results[0]->name}}</h2></div>
                <div id="body-card">
                    <div class="card-body">
                        <img class="list_image" src="{{ $results[0]->file_path}}" alt="race_img" style="width:50%;opacity:0.85;">
                        
                        <!-- Race Information -->
                        Date: {{date('d-m-Y', strtotime($results[0]->date))}}<br>
                        Time: {{date('H:i:s', strtotime($results[0]->date))}}<br>
                        Location: {{$results[0]->location}}<br>
                        <!-- Shows the tournament the race belongs to if it belongs to one -->
                        @isset($results[0]->tournament_name)
                            Tournament: {{$results[0]->tournament_name}}<br>
                        @endif
                        <br>
                        Description: {{$results[0]->description}}<br>
                        
                        
                        <br>
                        <!-- List of horses in the race -->
                        <h3>Horses in this race: </h3>
                        <ul>  
                        @foreach($results as $result)
                            <li><a href='/horses/{{$result->horse_id}}'>{{$result->horse_name}}</a></li>
                        @endforeach
                        </ul>
                        
                        <!-- List of jockeys in the race -->
                        <h3>Jockeys in this race: </h3>
                        <ul>  
                        @foreach($results as $result)
                            <li><a href='/jockeys/{{$result->jockey_id}}'>{{$result->jockey_name}}</a></li>
                        @endforeach
                        </ul>

                        <!-- Table with the horses/jockeys in the race with their time and win rate -->
                        <h3>Results: </h3>
                        <table id="race_results_table" style="width:60%">
                            <tr>
                                <th>Win Prob</th>
                                <th>Horse</th>
                                <th>Jockey</th> 
                                <th>Time</th>
                                <!-- If the user is logged in and is an admin create new collumn on the table for the edit buttons -->
                                @auth
                                    @if(Auth::user()->role=='admin')
                                        <th> </th>
                                    @endif
                                @endauth
                                </tr>
                            @foreach($results as $result)
                                <tr>
                                    <!-- Win rate of the pair horse/jockey for the race-->
                                    @foreach($scores as $score)
                                        @if($score->horse_id==$result->horse_id)
                                            <td>{{round(($score->wr/$win_total),2)}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$result->horse_name}}</td>
                                    <td>{{$result->jockey_name}}</td>
                                    <!-- Show the pair's time in the race -->
                                    @isset($result->time)
                                        <td>{{$result->time}}</td>
                                    @else
                                        <td>00:00:00</td>
                                    @endif 
                                    <!-- If the user is logged in and is an admin he can select the edit buttons for each result -->
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

                        <!-- Shows the race's winner if there is one -->
                        @isset($winner->time)
                            <h4 align="center">{{$winner->horse_name}} and {{$winner->jockey_name}} with a best time: 
                            {{$winner->time}}</h4>
                        @endif
                        <div>
                            @auth
                                <!-- If the user logged in is an admin he can edit the information -->
                                @if(Auth::user()->role=='admin')
                                    <div class="details_button">
                                        <a href="/edit_race={{$results[0]->race_id}}">Edit Race</a>
                                    </div>
                                @endif
                                <!-- If the user logged in and the race still hasn't happened the user can bet on it --> 
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