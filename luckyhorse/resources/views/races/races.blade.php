@extends('layouts.head_footer')

@section('content')
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
    h2{
        color: red;
        font-weight:bold; 
    }

    /*Pagination*/
    .center {
        text-align: center;
    }
    .pagination {
        display: inline-block;
    }
    .pagination a {
        color: white;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        margin: 0 1px;
        background-color: #333;
    }
    .pagination a.active {
        background-color: #fa8b1b;
        color: white;
        border: 1px solid #fa8b1b;
    }
    .pagination a:hover:not(.active) {
        background-color: #939393;
    }
</style>

<h1 align="center">Races</h1>




@foreach($races as $race)


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                   <div class="card-header"> <h2>{{$race->name}}</h2></div>  
             <!--   <button onclick="myFunction()">{{$race->name}}</button> -->
                    <div id="body-card">
                        <div class="card-body">
                            <img src="{{ $race->file_path}}" alt="race_img" style="width:40%;opacity:0.85;">
                            
                            
                            Date: {{$race->date}}<br>
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

                            <!-- -------------------  devolve os resultados de cada corrida -------------------------- -->
                            <h3>Results: </h3>

                            <table style="width:60%">
                                <tr>
                                    <th>Horse</th>
                                    <th>Jockey</th> 
                                    <th>Time</th>
                                </tr>

                            @foreach($results as $result)
                            <?php
                            if($result->race_id == $race->id){
                            
                            if(($result->time) == null){
                                echo "<tr><td colspan='3'> This race don't have results yet </td></tr>";
                            }
                                
                            //se a corrida já tiver resultados
                            if(($result->time) != null){ 
                            ?>

                               
                            @foreach($horses as $horse)
                            
                                <?php
                                    if($result->horse_id == $horse->id){
                                        echo "  <tr><td>{$horse->name}</td>";   
                                    }  
                                ?>
                            @endforeach 

                            @foreach($jockeys as $jockey)
                            
                            <?php
                                if($result->jockey_id == $jockey->id){
                                    echo "<td>{$jockey->name}</td> ";
                                
                                    
                                    
                                }  
                            ?>
                            @endforeach
                            

                                            
                            <?php
                            
                                    echo "<td>{$result->time}</td> ";
                                    echo "</tr>";
                                    }

                            
                            }else{
                               // echo "no results";
                            }
                            
                            ?>
                            @endforeach

                            </table>
                            
                            <!-- --------------------- devolve o vencedor de cada corrida ------------------------ -->
                          <br>

                            
                            @foreach($winners as $winner)
                                @if($winner[0]->race_id==$race->id)
                                    @if($winner[0]->time != null)
                                        <h3>Winner: </h3>
                                        <h4 align="center">    {{$winner[0]->name}} with a best time: {{$winner[0]->time}}</h4>
                                    @endif
                                @endif
                            @endforeach
    

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endforeach

<!--Pagination-->
<div class="center">
  <div class="pagination">
    @if($page_number==1)
      <a href="">&laquo;</a>
    @else
      <a href="/races_page={{$page_number-1}}">&laquo;</a>
    @endif
    @if($pages_total<7)
      <a href="/races_page=1" @if($page_number==1) class="active" @endif>1</a>
      @if($pages_total>1)
        <a href="/races_page=2" @if($page_number==2) class="active" @endif>2</a>
        @if($pages_total>2)
          <a href="/races_page=3" @if($page_number==3) class="active" @endif>3</a>
          @if($pages_total>3)
            <a href="/races_page=4" @if($page_number==4) class="active" @endif>4</a>
            @if($pages_total>4)
              <a href="races_page=5" @if($page_number==5) class="active" @endif>5</a>
              @if($pages_total>5)
                <a href="races_page=6" @if($page_number==6) class="active" @endif>6</a>
              @endif
            @endif
          @endif
        @endif
      @endif
      @if($pages_total==$page_number)
        <a href="">&raquo;</a>
      @else
        <a href="/races_page={{$page_number+1}}">&raquo;</a>
      @endif
    @elseif($page_number<5)
    <a href="/races_page=1" @if($page_number==1) class="active" @endif>1</a>
    <a href="/races_page=2" @if($page_number==2) class="active" @endif>2</a>
    <a href="/races_page=3" @if($page_number==3) class="active" @endif>3</a>
    <a href="/races_page=4" @if($page_number==4) class="active" @endif>4</a>
    <a href="/races_page=5">5</a>
    <a href="/races_page=6">6</a>
    <a href="/races_page={{$page_number+1}}">&raquo;</a>
    @elseif($page_number<($pages_total-1))                 
      <a href="/races_page={{$page_number-3}}">{{$page_number-3}}</>
      <a href="/races_page={{$page_number-2}}">{{$page_number-2}}</a>
      <a href="/races_page={{$page_number-1}}">{{$page_number-1}}</a>
      <a href="/races_page={{$page_number}}" class="active">{{$page_number}}</a>
      <a href="/races_page={{$page_number+1}}">{{$page_number+1}}</a>
      <a href="/races_page={{$page_number+2}}">{{$page_number+2}}</a>
      <a href="/races_page={{$page_number+1}}">&raquo;</a>
    @else
      <a href="/races_page={{$pages_total-5}}">1</>
      <a href="/races_page={{$pages_total-4}}">{{$pages_total-4}}</a>
      <a href="/races_page={{$pages_total-3}}">{{$pages_total-3}}</a>
      <a href="/races_page={{$pages_total-2}}">{{$pages_total-2}}</a>
      <a href="races_page={{$pages_total-1}}" @if($page_number==$pages_total-1) class="active" @endif>{{$pages_total-1}}</a>
      <a href="/races_page={{$pages_total}}" @if($page_number==$pages_total) class="active" @endif>{{$pages_total}}</a>
      <a href="">&raquo;</a>
    @endif
  </div>
</div>

@endsection

