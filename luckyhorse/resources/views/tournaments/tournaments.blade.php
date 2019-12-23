@extends('layouts.head_footer')

@section('content')

<style>
    img{
        float:right;
    }

</style>

<h1 align="center">Tournaments</h1>

@foreach($tournaments as $tournament) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tournaments</div>

                <div class="card-body">
                    <img src="{{ $tournament->file_path}}" alt="tournament_img" style="width:40%;opacity:0.85;">
                    name: {{$tournament->name}}<br>
                    date: {{$tournament->date}}<br>
                    description: {{$tournament->description}}<br>
                    location: {{$tournament->location}}<br><br>
                    

                    @foreach($races as $race)
                    <?php
                        if($tournament->id == $race->tournament_id){
                            echo "race: {$race->name} <br>";
                        }
                        else{
                            echo "no races to this tournament <br>";
                        }
                    
                    ?>
                    @endforeach
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection