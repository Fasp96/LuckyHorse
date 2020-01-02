@extends('layouts.head_footer')

@section('content')

<style>
    h2{
        font-weight:bold; 
    }

    .user_table_data > td{
        padding: 5px;
    }
    table{
        width: 100%;
    }
    .edit_button{
        float: right;
        padding: 5px;
    }
    .edit_button > a {
        color: white;
        float: left;
        padding: 4px 8px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        border-radius: 11px;
        margin: 0 1px;
        background-color: #333;
    }
    .edit_button a:hover {
        background-color: #fa8b1b;
    }
    
</style>


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
                    Balance: {{number_format($user->balance, 2, '.', ',')}}<br>
                    
                </div>
                @auth
                    @if(Auth::user()->role=='admin')
                        <div>
                            <div class="edit_button">
                                <a href="/edit_user={{$user->id}}">Edit</a>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
<br>


@endsection