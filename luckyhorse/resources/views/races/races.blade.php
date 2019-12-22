@extends('layouts.head_footer')

@section('content')
<style>
img {
  float: right;
}
</style>

<h1 align="center">Races</h1>

@foreach($races as $race) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Races</div> -->

                <div class="card-body">
                            <img src="{{ $race->file_path}}" alt="race_img" style="width:40%;opacity:0.85;">
                            
                            name: {{$race->name}}<br>
                            date: {{$race->date}}<br>
                            description: {{$race->description}}<br>
                            local: {{$race->location}}<br>

                            @foreach($tournaments as $tournament)

                            <?php 
                            if($race->tournament_id == $tournament->id){ 
                                echo "tournament: {$tournament->name}<br>";  
                            }else{
                                echo "no tournament to this race<br>";
                            }
                            ?>
                            @endforeach
                            
                            @foreach($results as $result)
                            <?php
                                if($result->race_id == $race->id){
                                    echo "best result: {$race->time}<br>"
                            ?>

                            @foreach($horses as $horse)
                            <?php
                                if($result->horse_id == $horse->id){
                                    echo "by horse: {$horse->name}<br>";   
                                }  
                            ?>
                            @endforeach
                            foreach($jockeys as $jockey)
                            <?php
                                if($result->jockey_id == $jockey->id){
                                    echo "by jockey: {$jockey->name}<br>";
                                }
                                
           
                            ?>
                            
                            <?php
                                }else{
                                    echo "no results";
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

