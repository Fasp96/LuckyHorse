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
                            

                            <!--   -------------devolve os cavalos de cada corrida----------------    -->
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
                                
                            }
                            ?>
                            

                            @endforeach
                            
                            <!-- -------------------  devolve os jockeys de cada corrida -------------------------- -->
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
                                    echo "<li> {$jockey->name} </li>";   
                                }  
                            ?>
                            @endforeach
                            
                            
                            
                            <?php
                            }else{
                               // echo "no results";
                            }
                            ?>
                            

                            @endforeach

                            </ul>
                            
                            <!-- --------------------- devolve o vencedor de cada corrida ------------------------ -->
                            
                            {{$winners}}

                            <h3>Winner in this race: </h3>
                            
                            @foreach($winners as $winner)
                                @if($winner[0]->race_id==$race->id)
                                    {{$winner[0]->name}}
                                @endif
                            @endforeach

                            
                            <?php

                            
                           //foreach($winners as $winner){
                                //if($race->id == $winner->race_id ){
                                  // echo " {$winner->name} ";   
                                 
                            ?>


                            <?php
                               //}else{
                                //  echo "no results";
                            //  }
                      //    }
                            
                            ?>
                            

                           
                            

                         
                            
                            
                            

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>




@endforeach


@endsection

