@extends('layouts.head_footer')

@section('content')

<h1>Tournaments</h1>

<!-- Containers with basic information from a tournament -->
@foreach($tournaments as $tournament) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Tournaments</div> -->
                <div class="card-header"><h2>{{$tournament->name}}</h2></div>
                <div class="card-body">

                    <!-- Image and basic information of the tournament -->
                    <img class="list_image" src="{{ $tournament->file_path}}" alt="tournament_img" style="width:25%;opacity:0.85;">
                    Date: {{date('d-m-Y', strtotime($tournament->date))}}<br>
                    Location: {{$tournament->location}}<br>
                    <!-- Shows the tournament's winner if there is one -->
                    @foreach($winners as $winner)
                        @if($winner->count() > 0)
                            @if($winner[0]->count() > 2 && $winner[0]->tournament_id==$tournament->id)
                                Winners: {{$winner[0]->horse_name}} and {{$winner[0]->jockey_name}} <br>
                            @endif
                        @endif
                    @endforeach
                    <br>
                    <!-- Button to see all tournament details -->
                    <div class="edit_button">
                        <a href="/tournaments/{{$tournament->id}}">View Details</a>
                    </div>
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