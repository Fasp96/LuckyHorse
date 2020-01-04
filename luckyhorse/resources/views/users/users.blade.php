@extends('layouts.head_footer')

@section('content')

<!-- Containers with basic information from a horse -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Users</h2></div>
                <div class="card-body">
                    <!-- Table to display user's id, name and role -->
                    <table id="users_table">
                        <tr id="user_table_data">
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
                                <!-- Button to show all user's information -->
                                <div class="modify_button">
                                    <a href="/users/{{$user->id}}">Show</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <br><br>

                    <!-- Layout to permit pagination -->
                    @include('layouts.pagination')
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection