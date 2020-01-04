@extends('layouts.head_footer')

@section('content')

<script src="https://www.paypal.com/sdk/js?client-id=AVCnONY8yaX6hpJx3QIib8Y3XNgHtKPBMaXfJWuRIvUN6NqlzIXtfL2h5KDeZvGSAvgKwf24BSPOyMqb&currency=EUR"></script>
<script src="{{asset('js/payment_paypalAPI/payment_api.js')}}" defer></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"> <h2>ID: {{$user->id}}</h2></div>
                <div class="card-body">
                    
                    Name: {{$user->name}}<br>
                    Role: {{$user->role}}<br>
                    Email: {{$user->email}}<br>
                    Birth Date: {{date('d-m-Y', strtotime($user->birth_date))}}<br>
                    Gender: {{$user->gender}}<br>       
                    Phone Number: {{$user->phone_number}}<br>
                    Iban: {{$user->iban}}<br>
                    Date that joined: {{$user->created_at->format('d-m-Y')}}<br><br>
                    Balance: {{number_format($user->balance, 2, '.', ',')}}€<br><br>
                    
                    <div>
                        @auth
                            <div>
                                <input id="id" type="hidden" value="{{$user->id}}">
                                <div class="details_button">
                                    <form id="add_balance_form" method="post" action="">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        Value
                                        <input id="add_balance" type="number" class="form-control" name="add_balance"><br>
                                    </form>
                                    <div id="paypal-button-container" ></div>
                                    <script>
                                        /*paypal.Buttons({
                                            createOrder: function(data, actions) {
                                                // This function sets up the details of the transaction, including the amount and line item details.
                                                return actions.order.create({
                                                    purchase_units: [{
                                                    amount: {
                                                        value: document.getElementById("add_balance").value
                                                    }
                                                    }]
                                                });
                                                },
                                                onApprove: function(data, actions) {
                                                    $("#add_balance_form").submit();
                                                }
                                            }).render('#paypal-button-container');
                                            //This function displays Smart Payment Buttons on your web page.
                                            }*/
                                    </script>
                                </div>
                            </div>
                        @endauth
                        @auth
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