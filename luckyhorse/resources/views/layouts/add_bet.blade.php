@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/add_bet/bet_validator.js')}}" defer></script>
<script src="https://www.paypal.com/sdk/js?client-id=AYgioRC5pVnlpZLDWjr6waGMrCtN4Qqlygn63Lr7DkgiKKage3MsYYyBmPSuwAsO6_YW6gKXZtyy9nLh&currency=EUR"> // Required. Replace SB_CLIENT_ID with your sandbox client ID. </script>
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
                        <div id="form_end"></div>
                    </form>
                    <button id="add_bet_btn" class="btn btn-primary" disabled>Bet</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection