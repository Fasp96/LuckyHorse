@extends('layouts.head_footer')

@section('content')

<!-- JS file to validate all fields -->
<script src="{{asset('js/edit_race/race_result_validator.js')}}" defer></script>

<!-- Container of the form to edit a race result -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Result ID: {{$id}}</div>
                <div class="card-body">
                    <input id="id_result" type="hidden" value="{{$id}}">
                    
                    <!-- Form to edit a race result's time and if the pair is the winner or not-->
                    <form id ="result_form" method ="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Time
                        <input  type="time" class="form-control" name="time" onchange="validate_input()"><br>
                        Winning result of the race :
                        <input type="checkbox" name="winner" value="winner"><br><br>
                        <!-- Placeholder for the button after everything is validated -->
                        <div id="form_end"></div>
                    </form>
                    <button id="update_time_btn" class="btn btn-primary">Update Result</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection