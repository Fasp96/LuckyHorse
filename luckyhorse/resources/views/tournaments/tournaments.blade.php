@extends('layouts.head_footer')

@section('content')

<style>
    img{
        float:right;
        
        
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
                    
                    Date: {{$tournament->date}}<br>
                    Description: {{$tournament->description}}<br>
                    Location: {{$tournament->location}}<br><br>
                    
                    <h3>Races in this tournament:</h3>
                    <ul> 
                    @foreach($races as $race)
                    <?php
                        if($tournament->id == $race->tournament_id){
                            echo "<li> {$race->name} in {$race->location} </li>";
                            
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

@endsection