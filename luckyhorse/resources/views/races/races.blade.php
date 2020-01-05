@extends('layouts.head_footer')

@section('content')

<body>
<h1>Races</h1>

<!-- Containers with basic information from a race -->
@foreach($races as $race)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$race->name}}</h2></div>
                    <div class="card-body">

                        <!-- Image and basic information of the race -->
                        <img class="list_image" src="{{ $race->file_path}}" alt="race_img" style="width:25%;opacity:0.85;">
                        Date: {{date('d-m-Y', strtotime($race->date))}}<br>
                        Location: {{$race->location}}<br>
                        <!-- Shows the tournament the race belongs to if it belongs to one -->
                        @isset($race->tournament_name)
                            Tournament: {{$race->tournament_name}}<br>
                        @endif
                        <!-- Shows the race's winner if there is one -->
                        @foreach($winners as $winner)
                            @if($winner->count() > 0 && $winner[0]->race_id==$race->id && $winner[0]->time>'00:00:00')
                                Winners: {{$winner[0]->horse_name}} and {{$winner[0]->jockey_name}}
                            @endif
                        @endforeach
                        <br><br>
                        <!-- Button to see all race details -->
                        <div class="details_button">
                            <a href="/races/{{$race->id}}">View Details</a>
                        </div>
                        <!-- If the user is logged in and the race hasn't started, he can bet -->
                        @auth
                            @if($race->date > date("Y-m-d h:i:ss"))
                                <div>
                                    <div class="details_button bet_button">
                                        <a href="/add_bet_race={{$race->id}}">Bet</a>
                                    </div>
                                </div>
                            @endif
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endforeach

<!-- Layout to permit pagination -->
@include('layouts.pagination')

@endsection

