@extends('layouts.head_footer')

@section('content')

<!-- JS files to use api to add funds -->
<script src="https://www.paypal.com/sdk/js?client-id=AVCnONY8yaX6hpJx3QIib8Y3XNgHtKPBMaXfJWuRIvUN6NqlzIXtfL2h5KDeZvGSAvgKwf24BSPOyMqb&currency=EUR"></script>
<script src="{{asset('js/payment_paypalAPI/payment_api.js')}}" defer></script>

<!-- Container of all the horse information -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"> <h2>ID: {{$user->id}}</h2></div>
                <div class="card-body">

                    <!-- Horse Information -->
                    Name: {{$user->name}}<br>
                    Role: {{$user->role}}<br>
                    Email: {{$user->email}}<br>
                    Birth Date: {{date('d-m-Y', strtotime($user->birth_date))}}<br>
                    Gender: {{$user->gender}}<br>
                    Phone Number: {{$user->phone_number}}<br>
                    Date that joined: {{$user->created_at->format('d-m-Y')}}<br><br>
                    Balance: {{number_format($user->balance, 2, '.', ',')}}€<br><br>

                    <div>
                        <!-- If the user logged in he can add funds using paypal -->
                        @auth
                            <div>
                                <input id="id" type="hidden" value="{{$user->id}}">
                                <div class="details_button">
                                    <form id="add_balance_form" method="post" action="">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        Add funds
                                        <input id="add_balance" type="number" class="form-control" value="5" name="add_balance"><br>
                                    </form>
                                    <div id="paypal-button-container" ></div>
                                </div>
                            </div>
                        @endauth
                        @auth
                            <!-- If the user logged in is an admin he can edit the information -->
                            @if(Auth::user()->role=='admin')
                                <div>
                                    <div class="details_button bet_button">
                                        <a href="/edit_user={{$user->id}}">Edit</a>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>


@endsection
