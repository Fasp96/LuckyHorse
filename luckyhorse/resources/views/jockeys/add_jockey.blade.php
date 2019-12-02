@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/jockey_validator.js')}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jockeys</div>

                <div class="card-body">
                    <ul>
                        @foreach($jockeys as $jockey) 
                            <li>{{$jockey->name}} - {{$jockey->age}}</li>                    
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
                <div class="card-header">Add New Jockey</div>
                <div class="card-body">
                    
                    <form id ="jockey_form" method ="post" action="" enctype="multipart/form-data">
                        
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Name
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()"><br>
                        Birth Date
                        <input id="bitrh_date" type="date" class="form-control" name="birth_date" onchange="validate_input()"><br>
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
                    </form>
                    <button id="add_jockey_btn" class="btn btn-primary">Add Jockey</button>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection