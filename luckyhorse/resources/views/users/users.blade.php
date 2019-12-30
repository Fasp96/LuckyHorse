@extends('layouts.head_footer')

@section('content')

<style>
    h2{
        font-weight:bold; 
    }

    .user_table_data > td{
        padding: 5px;
        font-size: 1.2em;
    }
    table{
        width: 100%;
    }
    .modify_button > a {
        color: white;
        float: left;
        padding: 4px 8px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        border-radius: 11px;
        margin: 0 1px;
        background-color: #333;
        font-size: 0.9em;
    }
    .modify_button a:hover {
        background-color: #fa8b1b;
    }
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Users</h2></div>
                <div class="card-body">
                    <table>
                        <tr class="user_table_data">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Role</td>
                            <td></td>
                        </tr>
                        @foreach($users as $user) 
                        <tr class="user_table_data">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <div class="modify_button">
                                    <a href="/users/{{$user->id}}">Show</a>
                                </div>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        @endforeach
                    </table>

                    @include('layouts.pagination')

                </div>
            </div>
        </div>
    </div>
</div>
<br>


@endsection