@extends('layouts.head_footer')

@section('content')

<head>
<style>
    img {
        float:right;
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
    h1{
        color: green;
        font-weight:bold; 
    }
    h2{
        color: #333;
        font-weight:bold; 
    }
    h3{
        color: white;
         
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
    

</head>

<body>
<h1 align="center">Races</h1>

@foreach($races as $race)


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$race->name}}</h2></div>
                    <div class="card-body">
                        <img src="{{ $race->file_path}}" alt="race_img" style="width:25%;opacity:0.85;">
                        
                        Date: {{date('d-m-Y', strtotime($race->date))}}<br>
                        Local: {{$race->location}}<br>
                        @isset($race->tournament_name)
                            Tournament: {{$race->tournament_name}}<br>
                        @endif

                        <br><br>
                        <div class="details_button">
                            <a href="/races/{{$race->id}}">View Details</a>
                        </div>
                        @auth
                            <div>
                                <div class="details_button bet_button">
                                    <a href="/add_bet_race={{$race->id}}">Bet</a>
                                </div>
                            </div>
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

