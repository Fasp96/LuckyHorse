@extends('layouts.head_footer')

@section('content')

<!-- JS file to validate all fields -->
<script src="{{asset('js/add_jockey/jockey_validator.js')}}" defer></script>

<!-- List the last 10 jockeys added -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jockeys</div>
                <div class="card-body">
                    <ul>
                        @foreach($jockeys as $jockey) 
                            <li>{{$jockey->name}} - {{date('d-m-Y', strtotime($jockey->birth_date))}}</li>                    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- Container of the form to add a jockey -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Jockey</div>
                <div class="card-body">
                    <!-- Form to add a jockey -->
                    <form id ="jockey_form" method ="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Name
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()"><br>
                        Birth Date
                        <input id="bitrh_date" type="date" class="form-control" name="birth_date" onselect="validate_input()" onchange="validate_input()"><br>
                        Gender<br>
                        <div id="gender_radio">
                        <input id="gender" type="radio" name="gender" value="male"> Male<br>
                        <input id="gender" type="radio" name="gender" value="female"> Female<br>
                        <input id="gender" type="radio" name="gender" value="other"> Other<br><br>
                        </div>
                        Number of Races
                        <input id="num_races" type="number" class="form-control" name="num_races" onchange="validate_input()"><br>
                        Number of Victories
                        <input id="num_victories" type="number" class="form-control" name="num_victories" onchange="validate_input()"><br>
                        Jockey Photo <br><br>
                        <input id="jockey_photo" type="file" name="jockey_photo" accept="image/*" onchange="validate_input()"><br>
                        <br>
                        <!-- Placeholder for the button after everything is checked -->
                        <div id="form_end"></div>
                    </form>
                    <button id="add_jockey_btn" class="btn btn-primary">Add Jockey</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection