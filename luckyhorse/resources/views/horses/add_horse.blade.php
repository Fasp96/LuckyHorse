@extends('layouts.head_footer')

@section('content')

<!-- JS file to validate all fields -->
<script src="{{asset('js/add_horse/horse_validator.js')}}" defer></script>

<!-- List the last 10 horses added -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cavalos</div>
                <div class="card-body">
                    <ul>
                        @foreach($horses as $horse) 
                            <li>{{$horse->name}} - {{$horse->breed}}</li>                    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- Container of the form to add a horse -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Horse</div>
                <div class="card-body">
                    <!-- Form to add a horse -->
                    <form id="horse_form" method ="post" action="" enctype="multipart/form-data" >
                        <input type="hidden" id='token' name="_token" value="{{csrf_token()}} ">
                        Name
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()"><br>
                        Breed
                        <input id="breed" type="text" class="form-control" name="breed" onchange="validate_input()"><br>
                        Birth Date
                        <input id="birth_date" type="date" class="form-control" name="birth_date" onselect="validate_input()" onchange="validate_input()"><br>
                        Gender<br>
                        <div id="gender_radio">
                            <input id="gender" type="radio" name="gender" value="male" onchange="validate_input()"> Male<br>
                            <input id="gender" type="radio" name="gender" value="female" onchange="validate_input()"> Female<br><br>
                        </div>
                        Number of Races
                        <input id="num_races" type="number" class="form-control" name="num_races" onchange="validate_input()"><br>
                        Number of Victories
                        <input id="num_victories" type="number" class="form-control" name="num_victories" onchange="validate_input()"><br>
                        Horse Photo <br><br>
                        <input id="horse_photo" type="file" name="horse_photo" accept="image/*" onchange="validate_input()"><br>
                        <br>
                        <!-- Placeholder for the button after everything is validated -->
                        <div id="form_end"></div>
                    </form>
                    <button id="add_horse_btn" class="btn btn-primary">Add Horse</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection