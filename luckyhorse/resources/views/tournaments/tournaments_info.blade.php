@extends('layouts.head_footer')

@section('content')


@section('content')

<style>
    img{
        float:right;
    }
    h2{
        color:#333;
        font-weight:bold;
    }
    h5{
        margin-left: 2em;
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
                <!-- <div class="card-header">Tournaments</div> -->
                <div class="card-header"><h2>{{$tournaments->name}}</h2></div>
                <div class="card-body">
                    <img src="{{ $tournaments->file_path}}" alt="tournament_img" style="width:50%;opacity:0.85;">
                    
                    Date: {{date('d-m-Y', strtotime($tournaments->date))}}<br>
                    Time: {{date('H:i:s', strtotime($tournaments->date))}}<br>
                    Description: {{$tournaments->description}}<br>
                    @if($winner[0]->count() > 2)
                        Winners: {{$winner[0]->horse_name}} and {{$winner[0]->jockey_name}} <br>
                    @endif
                    <br>
                    <h3>Races in this tournament:</h3>
                    <ul>
                    @if($races->count() > 0)
                        @foreach($races as $race)
                            <li><a href='http://localhost:8000/races/{{$race->id}}'> {{$race->name}} in {{$race->location}} </a></li>
                        @endforeach
                    @else
                        No races for this tournament <br>
                    @endif
                    </ul> 
                    @auth 
                    @if(Auth::user()->role=='admin')
                        <div class="edit_button">
                            <a href="/edit_tournament={{$tournaments->id}}">Edit</a>
                        </div>
                    @endif  
                    
                        @if($winner[0]->count() == 2)
                            <div class="bet_button edit_button">
                                <a href="/add_bet_tournament={{$tournaments->id}}">Bet</a>
                            </div>
                        @endif
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
<br>




@endsection