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
        color: red;
        font-weight:bold; 
    }
    h3{
        color: white;
         
    }
    .modify_button{
        display: flex;
        align-items: center;
        justify-content: center;
        
    }
    .modify_button > a {
        color: white;
        float: left;
        padding: 4px 8px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        border-radius: 11px;
        
        background-color: #333;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        height: 50px;
        text-align: center;
    }
    .modify_button a:hover {
        background-color: #fa8b1b;
    }
    .button {
        background-color:#323232;
        border: none;
        padding: 15px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        width: 99%;
        height: 50px;
    }
    .button:hover {
        background-color: orange;
        color: white;
    }

    .bet_button{
        float: right;
        padding: 5px;
    }
    .bet_button > a {
        color: white;
        float: left;
        padding: 4px 12px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        border-radius: 11px;
        margin: 0 1px;
        background-color: #333;
    }
    .bet_button a:hover {
        background-color: #fa8b1b;
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

                    <div id="body-card">

                        <div class="modify_button">
                          <a href="/races/{{$race->id}}"><h3>{{$race->name}}</h3></a>
                        </div>

                        <div class="card-body">
                            <img src="{{ $race->file_path}}" alt="race_img" style="width:30%;opacity:0.85;">
                            
                            
                            Date: {{date('d-m-Y', strtotime($race->date))}}<br>
                            Description: {{$race->description}}<br>
                            Local: {{$race->location}}<br>

                            @foreach($tournaments as $tournament)

                            <?php 
                            if($race->tournament_id == $tournament->id){ 
                                echo "Tournament: {$tournament->name}<br><br>";  
                            }else{
                                //echo "no tournament to this race<br><br>";
                            }
                            ?>
                            @endforeach
                            <br>
                            @auth
                                <div>
                                    <div class="bet_button">
                                        <a href="/add_bet_race={{$race->id}}">Bet</a>
                                    </div>
                                </div>
                            @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endforeach

@include('layouts.pagination')

@endsection

