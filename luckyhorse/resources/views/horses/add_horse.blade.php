@extends('layouts.app')

@section('content')

<script src="{{asset('js/horse_validator.js')}}" defer></script>

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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Cavalo</div>
                <div class="card-body">
                    
                    <form id="horse_form" method ="post" action="" enctype="multipart/form-data" >
                        <input type="hidden" id='token' name="_token" value="{{csrf_token()}} ">
                        Name
                        <input type="text" class="form-control" name="name"><br>
                        Breed
                        <input type="text" class="form-control" name="breed"><br>
                        Birth Date
                        <input type="date" class="form-control" name="birth_date"><br>
                        Gender<br>
                        <div id="gender_radio">
                        <input type="radio" name="gender" value="male"> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br><br>
                        </div>
                        Number of Races
                        <input type="number" class="form-control" name="num_races"><br>
                        Number of Victories
                        <input type="number" class="form-control" name="num_victories"><br>
                        Horse Photo <br><br>
                        <input type="file" name="horse_photo" accept="image/*"><br>
                        <br>
                    </form>
                    <button id="add_horse_btn" class="btn btn-primary">Add Horse</button>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection