@extends('layouts.head_footer')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Bet</div>
                <div class="card-body">
                    
                    <form id="horse_form" method ="post" action="" enctype="multipart/form-data" >
                        <input type="hidden" id='token' name="_token" value="{{csrf_token()}} ">
                        Race Name<br>
                        {{$race->name}}
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()" value="{{$race->name}}"><br>
                        Date<br>
                        {{$race->date}}
                        <input id="date" type="date" class="form-control" name="date" onselect="validate_input()" onchange="validate_input()" value="{{$race->date}}"><br>
                        Horse
                        <input id="horse_name" type="text" class="form-control" name="horse_name" onchange="validate_input()"><br>
                        Jockey
                        <input id="jockey_name" type="text" class="form-control" name="jockey_name" onchange="validate_input()"><br>
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