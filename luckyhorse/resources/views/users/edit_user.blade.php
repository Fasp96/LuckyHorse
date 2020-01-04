@extends('layouts.head_footer')

@section('content')

<!-- JS file to validate all fields -->
<script src="{{asset('js/edit_user/user_validator.js')}}" defer></script>

<!-- Container of the form to edit a user -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User ID: {{$user->id}}</div>
                <div class="card-body">
                    <input id="id_user" type="hidden" value="{{$user->id}}">

                    <!-- Form filled with the corresponding values to edit a user -->
                    <form id="user_form" method ="post" action="" enctype="multipart/form-data" >
                        <input type="hidden" id='token' name="_token" value="{{csrf_token()}} ">
                        Name
                        <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" onchange="validate_input()"><br>
                        Role
                        <input id="role" type="text" class="form-control" name="role" value="{{$user->role}}" onchange="validate_input()"><br>
                        Email
                        <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}" onchange="validate_input()"><br>
                        Birth Date
                        <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{$user->birth_date}}" onselect="validate_input()" onchange="validate_input()"><br>
                        Gender<br>
                        <div id="gender_radio">
                            <input id="male" type="radio" name="gender" value="male" onchange="validate_input()"
                                {{ ($user->gender == "male")? "checked" : "" }}
                            >Male<br>
                            <input id="female" type="radio" name="gender" value="female" onchange="validate_input()"
                                {{ ($user->gender == "female")? "checked" : "" }}
                            >Female<br>
                            <input id="other" type="radio" name="gender" value="other" onchange="validate_input()"
                                {{ ($user->gender == "other")? "checked" : "" }}
                            >Other<br><br>
                        </div>
                        Phone Number
                        <input id="phone_number" type="number" class="form-control" name="phone_number" value="{{$user->phone_number}}" onchange="validate_input()"><br>
                        Balance
                        <input id="balance" type="number" class="form-control" name="balance" value="{{$user->balance}}" onchange="validate_input()"><br>
                        <br>
                        <!-- Placeholder for the button after everything is validated -->
                        <div id="form_end"></div>
                    </form>
                    <button id="update_user_btn" class="btn btn-primary">Update User</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
