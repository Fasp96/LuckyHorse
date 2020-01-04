@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/edit_race/race_result_validator.js')}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Result ID: {{$id}}</div>
                <div class="card-body">
                    <input id="id_result" type="hidden" value="{{$id}}">
                    
                    <form id ="result_form" method ="post" action="" enctype="multipart/form-data">
                        
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Time
                        <input  type="time" class="form-control" name="time" onchange="validate_input()"><br>
                        Winning result of the race :
                        <input type="checkbox" name="winner" value="winner"><br><br>
                        <div id="form_end"></div>
                    </form>
                    <button id="update_time_btn" class="btn btn-primary">Update Result</button>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection