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
                        <input id="add_tournament" type="radio" name="add_tournament" value="1" onchange="validate_input()"> Tournament 1<br>
                        <input id="add_tournament" type="radio" name="add_tournament" value="1" onchange="validate_input()"> Tournament 2<br>
                        <input id="add_tournament" type="radio" name="add_tournament" value="1" onchange="validate_input()"> Tournament 3<br><br>
                        Add Horse<br>
                        <input type="checkbox" style="color:black;" name="Cavalo 1" value="Cavalo 1"> Cavalo 1<br>
                        <input type="checkbox" style="color:black;" name="Cavalo 2" value="Cavalo 2"> Cavalo 2<br>
                        <input type="checkbox" style="color:black;" name="Cavalo 3" value="Cavalo 3"> Cavalo 3<br><br>
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