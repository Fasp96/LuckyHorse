@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/edit_user/user_validator.js')}}" defer></script>
<script src="{{asset('js/edit_user/get_user.js')}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User {{$id}}</div>
                <div class="card-body">
                    <input id="id_user" type="hidden" value="{{$id}}">

                    <form id="user_form" method ="post" action="" enctype="multipart/form-data" >
                        <input type="hidden" id='token' name="_token" value="{{csrf_token()}} ">
                        Name
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()"><br>
                        Role
                        <input id="role" type="text" class="form-control" name="role" onchange="validate_input()"><br>
                        Email
                        <input id="email" type="text" class="form-control" name="email" onchange="validate_input()"><br>
                        Birth Date
                        <input id="birth_date" type="date" class="form-control" name="birth_date" onselect="validate_input()" onchange="validate_input()"><br>
                        Gender<br>
                        <div id="gender_radio">
                            <input id="male" type="radio" name="gender" value="male" onchange="validate_input()">Male<br>
                            <input id="female" type="radio" name="gender" value="female" onchange="validate_input()">Female<br>
                            <input id="other" type="radio" name="gender" value="other" onchange="validate_input()">Other<br><br>
                        </div>
                        Phone Number
                        <input id="phone_number" type="number" class="form-control" name="phone_number" onchange="validate_input()"><br>
                        Balance
                        <input id="balance" type="number" class="form-control" name="balance" onchange="validate_input()"><br>
                        <!--Iban
                        <input id="iban" type="text" class="form-control" name="iban" onchange="validate_input()"><br>-->
                        <br>
                        <div id="form_end"></div>
                    </form>
                    <button id="update_user_btn" class="btn btn-primary">Update User</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
