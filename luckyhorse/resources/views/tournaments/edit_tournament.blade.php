@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/edit_tournament/tournament_validator.js')}}" defer></script>

<script src="{{asset('js/location_googleAPI/location_api.js')}}" defer></script>
<script src="{{asset('js/edit_tournament/get_tournament.js')}}" defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmwtm8ckX1GoVVRHlXggCJMuw_80xiJgA&libraries=geometry,places"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tournament ID: {{$id}}</div>
                <div class="card-body">                    
                    <input id="id_tournament" value="{{$id}}" type="hidden">
                    
                    <form id ="tournament_form" method ="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Name
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()"><br>
                        Initial Date and Time
                        <input id="initial_date" type="date" class="form-control" name="initial_date" onchange="validate_input();"><br>
                        <input id="initial_time" type="time" class="form-control" name="initial_time" value = '00:00' onchange="validate_input();"><br>
                        Expected Finish Date
                        <input id="finish_date" type="date" class="form-control" name="finish_date" onselect="add_race_field(initial_date, initial_time, finish_date, finish_time); validate_input();" onchange="add_race_field(initial_date, initial_time, finish_date, finish_time); validate_input();"><br>
                        <input id="finish_time" type="time" class="form-control" name="finish_time" value = '00:00' onselect=" add_race_field(initial_date, initial_time, finish_date, finish_time); validate_input();" onchange="add_race_field(initial_date, initial_time, finish_date, finish_time); validate_input();"><br>
                        Add Races<br><br>
                        <div id="race_fields">
                            <input type="hidden" id="races" name="races">
                            <p>Please insert initial date or expected finish date to show races</p>    
                        </div><br>
                        Description<br>
                        <textarea id="description" class="form-control" name="description" rows="5" cols="80" onchange="validate_input()"></textarea><br>
                        Location
                        <input id="location" type="text" class="form-control" name="location" onchange="validate_input()"><br>
                        
                        Tournament Photo <br><br>
                        <input id="tournament_photo" type="file" name="tournament_photo" accept="image/*" onchange="validate_input()"><br>
                        <br>
                        <div id="form_end"></div>
                    </form>
                    <button id="update_tournament_btn" class="btn btn-primary">Update Tournament</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/edit_tournament/tournament_add_race.js')}}" defer></script>
<!--
<script>
    // Reload Page Function //
    // get the time parameter //
        let parameter = new URLSearchParams(window.location.search);
          let time = parameter.get("time");
          console.log(time)//1
          let timeId;
          if (time == 1) {
    // reload the page after 0 ms //
           timeId = setTimeout(() => {
            window.location.reload();//
           }, 500);
   // change the time parameter to 0 //
           let currentUrl = new URL(window.location.href);
           let param = new URLSearchParams(currentUrl.search);
           param.set("time", 0);
   // replace the time parameter in url to 0; now it is 0 not 1 //
           window.history.replaceState({}, "", `${currentUrl.pathname}?${param}`);
        // cancel the setTimeout function after 0 ms //
           let currentTime = Date.now();
           if (Date.now() - currentTime > 0) {
            clearTimeout(timeId);
           }
          }
    </script>
-->
@endsection