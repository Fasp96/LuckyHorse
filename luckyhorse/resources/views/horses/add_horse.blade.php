@extends('layouts.app')

@section('content')

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
<!-- adicionar notas -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Cavalo</div>
                <div class="card-body">
                    
                    <form method ="post" action="/horses">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        Name
                        <input type="text" class="form-control" name="name"><br>
                        Breed
                        <input type="text" class="form-control" name="breed"><br>
                        Age
                        <input type="text" class="form-control" name="age"><br>
                        Number of Races
                        <input type="text" class="form-control" name="num_races"><br>
                        Number of Victories
                        <input type="text" class="form-control" name="num_victories"><br>
                        <br>
                        Horse Photo <br>
                        <input type="file" name="horse_photo" accept="image/*"><br>
                        <br>
                        <button type="submit" class="btn btn-primary">Add Horse</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection