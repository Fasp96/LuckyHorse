@extends('layouts.head_footer')

@section('content')

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
                                <div class="details_button">
                                    <a href="/edit_user={{$user->id}}">Add Funds</a>
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