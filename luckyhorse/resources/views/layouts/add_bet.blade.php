@extends('layouts.head_footer')

@section('content')

<!-- JS file to validate all fields -->
<script src="{{asset('js/add_bet/bet_validator.js')}}" defer></script>

<!-- Container of form to add a bet -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Place New Bet</div>
                <div class="card-body">

                    <!-- Form to add a bet -->
                    <form id="bet_form" method ="post" action="" enctype="multipart/form-data" >
                        <input type="hidden" id='token' name="_token" value="{{csrf_token()}} ">
                        <input type="hidden" id='user_balance' name="user_balance" value="{{Auth::user()->balance}} ">

                        <!-- Fields that depend if it is a race or tournament bet -->
                        @yield('bet_type')

                        <!-- Field to select the winning pair from all the involved pairs -->
                        Winning Pair
                        <select id="pair" name="pair" class="form-control">
                            @foreach($results as $result)
                                <option value="{{$result->horse_id}}_{{$result->jockey_id}}">
                                    {{$result->horse_name}} - {{$result->jockey_name}}
                                </option>
                            @endforeach
                        </select>
                        <br>
                        Value
                        <input id="bet_value" type="number" class="form-control" name="bet_value" onchange="validate_input()"><br>
                        <br>
                        <!-- Placeholder for the button after everything is validated -->
                        <div id="form_end"></div>
                    </form>
                    <button id="add_bet_btn" class="btn btn-primary" disabled>Bet</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection