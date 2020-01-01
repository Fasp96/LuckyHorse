@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/add_bet/bet_validator.js')}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Place New Bet</div>
                <div class="card-body">
                    
                    <form id="bet_form" method ="post" action="" enctype="multipart/form-data" >

                        <input type="hidden" id='token' name="_token" value="{{csrf_token()}} ">
                        Tournament Name<br>
                        <input id="name" type="text" class="form-control" name="name" value="{{$tournament->name}}" disabled><br>
                        Date<br>
                        <input id="date" type="date" class="form-control" name="date" value="{{date('Y-m-d', strtotime($tournament->date))}}" disabled><br>
                        Horse
                        <select id="horse" name="horse" class="form-control">
                            @foreach($horses as $horse)
                                <option value="{{$horse->horse_id}}">{{$horse->horse_name}}</option>
                            @endforeach
                        </select>
                        <br>
                        Jockey
                        <select id="jockey" name="jockey" class="form-control">
                            @foreach($jockeys as $jockey)
                                <option value="{{$jockey->jockey_id}}">{{$jockey->jockey_name}}</option>
                            @endforeach
                        </select>
                        <br>
                        Value
                        <input id="value" type="number" class="form-control" name="value" onchange="validate_input()"><br>
                        <br>
                    </form>
                    <button id="add_bet_btn" class="btn btn-primary">Bet</button>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection