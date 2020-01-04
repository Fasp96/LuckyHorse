@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/edit_race/race_add_tournament.js')}}" defer></script>
<script src="{{asset('js/edit_race/get_race.js')}}" defer></script>

<script src="{{asset('js/edit_race/race_validator.js')}}" defer></script>
<script src="{{asset('js/location_googleAPI/location_api.js')}}" defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmwtm8ckX1GoVVRHlXggCJMuw_80xiJgA&libraries=geometry,places"></script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Race ID: {{$id}}</div>
                <div class="card-body">
                    <input id="id_race" type="hidden" value="{{$id}}">
                    
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
                        <div id="form_end"></div>
                    </form>
                    <button id="update_race_btn" class="btn btn-primary">Update Race</button>

                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{asset('js/edit_race/race_add_jockey_horse.js')}}" defer></script>
<script src="{{asset('js/edit_race/get_horse_jockey.js')}}" defer></script>
<!--
<script>
    window.onload = function () {window.location.reload()}
    </script>

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
           }, 300);
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