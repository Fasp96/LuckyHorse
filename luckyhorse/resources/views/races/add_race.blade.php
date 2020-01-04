@extends('layouts.head_footer')

@section('content')

<!-- JS files to validate all fields, to get jockeys/horses/tournaments and use api for location -->
<script src="{{asset('js/add_race/race_validator.js')}}" defer></script>
<script src="{{asset('js/add_race/race_add_jockey_horse.js')}}" defer></script>
<script src="{{asset('js/add_race/race_add_tournament.js')}}" defer></script>
<script src="{{asset('js/location_googleAPI/location_api.js')}}" defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmwtm8ckX1GoVVRHlXggCJMuw_80xiJgA&libraries=geometry,places"></script>

<!-- List the last 10 races added -->
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
<!-- Container of the form to add a race -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Race</div>
                <div class="card-body">
                    <!-- Form to add a race -->
                    <form id ="race_form" method ="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Name
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()"><br>
                        Date and time
                        <input id="date" type="date" class="form-control" name="date" onselect="add_tournaments(date, race_time); validate_input();" onchange="add_tournaments(date, race_time); validate_input();"><br>
                        <input id="race_time" type="time" class="form-control" name="race_time" value = '00:00' onselect="add_tournaments(date, race_time); validate_input();" onchange="add_tournaments(date, race_time); validate_input();"><br>
                        Add to Tournament<br>
                        <div id="add">
                            <h6 id="tournaments" style="color:black; padding-top:1%; padding-left:5%">***No Tournaments***</h6>
                        </div>
                        <br>
                        Add Horse with Jockey<br>
                        <!-- Depending on the number of participants, more fields to select the teams will be added -->
                        Number of Participants<input id="num_fields" type="number" class="form-control" name="num_fields" value = "0" onchange="add_fields(); validate_input();"><br>

                        <div id="fields">
                            <!-- 
                                the fields to create the teams wil be added inside this div
                            -->
                        </div>
                        Description<br>
                        <textarea id="description" class="form-control" name="description" rows="5" cols="80" onchange="validate_input()"></textarea><br>
                        Location
                        <input id="location" type="text" class="form-control" name="location" onchange="validate_input()"><br>
                        Race Photo <br><br>
                        <input id="race_photo" type="file" name="race_photo" accept="image/*" onchange="validate_input()"><br>
                        <br>
                        <!-- Placeholder for the button after everything is validated -->
                        <div id="form_end"></div>
                    </form>
                    <button id="add_race_btn" class="btn btn-primary">Add Race</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection