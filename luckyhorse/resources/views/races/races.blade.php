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
                   <div class="card-header"> {{$race->name}}</div>  
             <!--   <button onclick="myFunction()">{{$race->name}}</button> -->
                    <div id="body-card">
                        <div class="card-body">
                            <img src="{{ $race->file_path}}" alt="race_img" style="width:40%;opacity:0.85;">
                            
                            
                            date: {{$race->date}}<br>
                            description: {{$race->description}}<br>
                            local: {{$race->location}}<br>

                            @foreach($tournaments as $tournament)

                            <?php 
                            if($race->tournament_id == $tournament->id){ 
                                echo "tournament: {$tournament->name}<br><br>";  
                            }else{
                                echo "no tournament to this race<br><br>";
                            }
                            ?>
                            @endforeach
                            

                            <!--   -----------------------------    -->
                            <h3>Horses in this race: </h3>
                            
                            <ul>  

                            @foreach($results as $result)
                            <?php
                            if($result->race_id == $race->id){
                                
                                 //   echo "<li>{$race->time}</li>"
                            ?>

                            @foreach($horses as $horse)
                            <?php
                                if($result->horse_id == $horse->id){
                                    echo "<li> {$horse->name}</li>";   
                                }  
                            ?>
                            @endforeach
                            
                            
                            
                            <?php
                            }else{
                                echo "no results";
                            }
                            ?>
                            

                            @endforeach
                            
                            <!-- --------------------------------------------- -->
                            </ul>

                            <h3>Jockeys in this race: </h3>
                            
                            <ul>  

                            @foreach($results as $result)
                            <?php
                            if($result->race_id == $race->id){
                                
                                 //   echo "<li>{$race->time}</li>"
                            ?>

                            @foreach($jockeys as $jockey)
                            <?php
                                if($result->jockey_id == $jockey->id){
                                    echo "<li> {$jockey->name}</li>";   
                                }  
                            ?>
                            @endforeach
                            
                            
                            
                            <?php
                            }else{
                                echo "no results";
                            }
                            ?>
                            

                            @endforeach

                            </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
 @endforeach



@endsection

