@extends('layouts.head_footer')

@section('content')


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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Tournaments</div> -->
                <div class="card-header"><h2>{{$tournaments->name}}</h2></div>
                <div class="card-body">
                    <img src="{{ $tournaments->file_path}}" alt="tournament_img" style="width:40%;opacity:0.85;">
                    
                    Date: {{date('d-m-Y', strtotime($tournaments->date))}}<br>
                    Time: {{date('H:i:s', strtotime($tournaments->date))}}<br>
                    Description: {{$tournaments->description}}<br>
                    Location: {{$tournaments->location}}<br><br>
                    
                    <h3>Races in this tournament:</h3>
                    <ul>
                    @foreach($races as $race)
                    <?php
                        if($tournaments->id == $race->tournament_id){
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




@endsection