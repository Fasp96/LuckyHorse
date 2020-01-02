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
                        <input type="hidden" id='user_balance' name="user_balance" value="{{Auth::user()->balance}} ">

                        @yield('bet_type')

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
                        <input id="bet_value" type="number" class="form-control" name="bet_value" onchange="validate_input()"><br>
                        <br>
                    </form>
                    <button id="add_bet_btn" class="btn btn-primary" disabled>Bet</button>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection