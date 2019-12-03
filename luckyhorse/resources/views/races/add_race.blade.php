@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/race_validator.js')}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Races</div>

                <div class="card-body">
                    <ul>
                        @foreach($races as $race) 
                            <li>{{$race->name}}</li>                    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Race</div>
                <div class="card-body">
                    
                    <form id ="race_form" method ="post" action="" enctype="multipart/form-data">
                        
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Name
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()"><br>
                        Date
                        <input id="date" type="date" class="form-control" name="date" onchange="validate_input()"><br>
                        Add to Tournament<br>
                        <?php if($tournaments == '[]'){?>
                            <p style="color:black; padding-top:1%; padding-left:5%">No Horses<p>
                        <?php }else{?>
                            <select id="add_tournament" name="add_tournament" class="form-control" onchange="validate_input()">
                                <option value="">
                                @foreach($tournaments as $tournament)
                                <option value="{{$tournament->id}}"> {{$tournament->name}} - {{$tournament->date}}                   
                                @endforeach
                            </select>
                        <?php } ?>
                        <br>
                        
                        Add Horse<br>
                        <?php if($horses == '[]'){?>
                            <p style="color:black; padding-top:1%; padding-left:5%">No Horses<p>
                        <?php }else{?>
                        @foreach($horses as $horse) 
                        <input type="checkbox" style="color:black;" name="{{$horse->name}}" value="{{$horse->id}}" onchange="validate_input()"> {{$horse->name}} - {{$horse->breed}}<br>                    
                        @endforeach
                        <?php } ?>
                        <br>
                        Description<br>
                        <textarea id="description" class="form-control" name="description" rows="5" cols="80" onchange="validate_input()"></textarea><br>
                        Location
                        <input id="location" type="text" class="form-control" name="location" onchange="validate_input()"><br>
                        Race Photo <br><br>
                        <input id="race_photo" type="file" name="race_photo" accept="image/*" onchange="validate_input()"><br>
                        <br>
                    </form>
                    <button id="add_race_btn" class="btn btn-primary">Add Race</button>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection