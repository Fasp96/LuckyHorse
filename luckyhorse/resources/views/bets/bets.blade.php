@extends('layouts.head_footer')

@section('content')

<style>

    /*Last Results Tables*/
    #last_results_tables{
        display: flex;
        justify-content: space-evenly;
        color: white;
    }
    #last_results_tables [class="result_table"]{
        padding: 1px;
    }
    #last_results_tables [class="tab_title"]{
        background-color: #fa8b1b;
        border: 1px solid black;
    }
    #last_results_tables [class="tab_tags"]{
        background-color: #333;
        border: 1px solid black;
        font-weight: bold;
        padding: 5px;
    }
    #last_results_tables [class="tab_result"]{
        background-color: grey;
        border: 1px solid black;
    }
    #last_results_tables [class="tab_position"]{
        background-color: grey;
        font-weight: bold;
    }
    caption {
        caption-side: top;
        color: white;
        text-align: center;
        padding: 0px;
        font-weight: bold;
        width: 600px;
    }
    table {
        text-align: center;
    }
    td{
        padding: 3px;
    }
    a{
        color: white;
    }
    
</style>

<h1 align="center">Bets</h1>
{{$major_values}}

<div id="last_results_tables">
    <table class="result_table">
        <caption class="tab_title">
            <div>Bets</div>
        </caption>

        <tr class="tab_tags">
        <!--    <td></td>  -->
            <td>Race</td>
            <td class="table_center_element">Tournament</td>
            <td>Horse</td>
            <td>Value</td>
        </tr>

        @foreach ($races as $race)
            <?php
                if(date('Y-m-d') < $race->date){
                    //echo "{$race->name}";
                    ?>
                     

                   
                            @foreach($major_values as $major)
                                <!--                               -->
                                @if($major[0]->race_id==$race->id)
                                    

                                        <tr class="tab_result">
                                      <!--     <td class="tab_position">{{$race->id}}</td> -->
                                            <td><a href="/races/{{$race->id}}">{{$race->name}}</a></td>

                                            @foreach($tournaments as $tournament)
                                               @if( $major[0]->tournament_id == $tournament->id )  
                                                   <td><a href="/tournaments/{{$major[0]->tournament_id}}"> {{$tournament->name}} </a></td>
                                               @endif 
                                            @endforeach


                                            @foreach($horses as $horse)
                                                @if( $major[0]->horse_id == $horse->id ) 
                                                    <td><a href="/horses/{{$major[0]->horse_id}}">{{$horse->name}}</a></td>
                                                @endif 
                                            @endforeach

                                            <td>{{$major[0]->value}}</td>
                                            
                                        </tr>
                                
               
                        </div>
                        
                        @endif
                       
                     @endforeach
            <?php  }else{
                        //date('Y-m-d') > $race->date
                }
                ?>
               
           
           
        @endforeach

    </table>



@endsection