@extends('layouts.app')

@section('content')

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
                <div class="card-header">Adicionar Jockey</div>
                <div class="card-body">
                    
                    <form method ="post" action="/jockeys">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        Name
                        <input type="text" class="form-control" name="name"><br>
                        Age
                        <input type="text" class="form-control" name="age"><br>
                        Racing Horse
                        <input type="text" class="form-control" name="num_races"><br>
                        Number of Races
                        <input type="text" class="form-control" name="num_races"><br>
                        Number of Victories
                        <input type="text" class="form-control" name="num_victories"><br>
                        <br>
                        Jockey Photo <br>
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