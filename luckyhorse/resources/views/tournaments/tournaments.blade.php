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
        color:red;
        font-weight:bold;
    }

    h5{
        margin-left: 2em;
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
                    <img src="{{ $tournament->file_path}}" alt="tournament_img" style="width:40%;opacity:0.85;">
                    
                    Date: {{date('d-m-Y', strtotime($tournament->date))}}<br>
                    Time: {{date('H:i:s', strtotime($tournament->date))}}<br>
                    Description: {{$tournament->description}}<br>
                    Location: {{$tournament->location}}<br><br>
                    
                    <h3>Races in this tournament:</h3>
                    <ul>
                    @foreach($races as $race)
                    <?php
                        if($tournament->id == $race->tournament_id){
                            echo "<li><a href='http://localhost:8000/races/{$race->id}'> {$race->name} in {$race->location} </a></li>";
                            
                        }
                        else{
                            echo "no races to this tournament <br>";
                        }
                    
                    ?>
                    @endforeach
                    </ul>    
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach

@include('layouts.pagination')

@endsection