@extends('layouts.head_footer')

@section('content')

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
    img {
        
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
</style>
    

</head>

<body>
<h1 align="center">Races</h1>

@foreach($races as $race)


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--   <div class="card-header"> <h2>{{$race->name}}</h2></div>  -->

                
                    <div id="body-card">

                    <div class="button-container">
                        <button class="button" id="{{$race->id}}"><h3>{{$race->name}}</h3></button> 
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
                                echo "no tournament to this race<br><br>";
                            }
                            ?>
                            @endforeach
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endforeach

@include('layouts.pagination')

<script>
        $("body").on( "click", ".button-container button",function(){
        //var y = $(this).text();
        var x = $(this).attr('id');
        
        location.replace("http://localhost:8000/races/" + x);   
    });

</script>

</body>
@endsection

