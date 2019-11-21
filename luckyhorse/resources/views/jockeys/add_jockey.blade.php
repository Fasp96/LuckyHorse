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
                        Birth Date
                        <input type="date" class="form-control" name="birth_date"><br>
                        Gender<br>
                        <input type="radio" name="gender" value="male"> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        <input type="radio" name="gender" value="other"> Other<br><br>
                        Racing Horse
                        <input type="number" class="form-control" name="horse_id"><br>
                        Number of Races
                        <input type="number" class="form-control" name="num_races"><br>
                        Number of Victories
                        <input type="number" class="form-control" name="num_victories"><br>
                        <br>
                        Jockey Photo <br>
                        <input type="file" name="jockey_photo" accept="image/*"><br>
                        <br>
                        <button type="submit" class="btn btn-primary">Add Jockey</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection