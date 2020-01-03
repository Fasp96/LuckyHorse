@extends('layouts.head_footer')

@section('content')

<h1>Options</h1>
<div class="center">
    <div class="choice">
        <a href="{{ url('/add_horses') }}"><h3>Add Horse</h3></a>
    </div>
</div>
<div class="center">
    <div class="choice">
        <a href="{{ url('/add_jockeys') }}"><h3>Add Jockey</h3></a>
    </div>
</div>
<div class="center">
    <div class="choice">
        <a href="{{ url('/add_races') }}"><h3>Add Race</h3></a>
    </div>
</div>
<div class="center">
    <div class="choice">
        <a href="{{ url('/add_tournaments') }}"><h3>Add Tournament</h3></a>
    </div>
</div>
<div class="center">
    <div class="choice">
        <a href="{{ url('/add_news') }}"><h3>Add News</h3></a>
    </div>
</div>
<div class="center">
    <div class="choice">
        <a href="{{ url('/users') }}"><h3>Manage Users</h3></a>
    </div>
</div>



@endsection