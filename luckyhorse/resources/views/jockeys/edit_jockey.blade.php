@extends('layouts.head_footer')

@section('content')

<!-- JS file to validate all fields -->
<script src="{{asset('js/edit_jockey/jockey_validator.js')}}" defer></script>

<!-- Container of the form to edit a jockey -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jockey ID: {{$jockey->id}}</div>
                <div class="card-body">
                    <input id="id_jockey" type="hidden" value="{{$jockey->id}}">

                    <!-- Form filled with the corresponding values to edit a jockey -->
                    <form id ="jockey_form" method ="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Name
                        <input id="name" type="text" class="form-control" name="name" value="{{$jockey->name}}" onchange="validate_input()"><br>
                        Birth Date
                        <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{$jockey->birth_date}}" onselect="validate_input()" onchange="validate_input()"><br>
                        Gender<br>
                        <div id="gender_radio">
                        <input id="male" type="radio" name="gender" value="male"
                            {{ ($jockey->gender == "male")? "checked" : "" }}
                        > Male<br>
                        <input id="female" type="radio" name="gender" value="female"
                            {{ ($jockey->gender == "female")? "checked" : "" }}
                        > Female<br>
                        <input id="other" type="radio" name="gender" value="other"
                            {{ ($jockey->gender == "other")? "checked" : "" }}
                        > Other<br><br>
                        </div>
                        Number of Races
                        <input id="num_races" type="number" class="form-control" name="num_races" value="{{$jockey->num_races}}" onchange="validate_input()"><br>
                        Number of Victories
                        <input id="num_victories" type="number" class="form-control" name="num_victories" value="{{$jockey->num_victories}}" onchange="validate_input()"><br>
                        Jockey Photo <br><br>
                        <input id="jockey_photo" type="file" name="jockey_photo" accept="image/*" onchange="validate_input()"><br>
                        <br>
                        <!-- Placeholder for the button after everything is checked -->
                        <div id="form_end"></div>
                    </form>
                    <button id="update_jockey_btn" class="btn btn-primary">Update Jockey</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection