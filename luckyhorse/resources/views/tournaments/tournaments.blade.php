@extends('layouts.head_footer')

@section('content')

<style>
    img{
        float:right;
        
        
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
                <div class="card-header">{{$tournament->name}}</div>
                <div class="card-body">
                    <img src="{{ $tournament->file_path}}" alt="tournament_img" style="width:40%;opacity:0.85;">
                    
                    date: {{$tournament->date}}<br>
                    description: {{$tournament->description}}<br>
                    location: {{$tournament->location}}<br><br>
                    
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