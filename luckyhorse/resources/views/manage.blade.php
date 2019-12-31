@extends('layouts.head_footer')

@section('content')

<style>
    h1{
        font-weight:bold; 
        text-align: center;
    }
    .option_button {
        width: 50%;
    }
    .option_button > a {
        color: white;
        float: left;
        padding: 4px 8px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        margin: 0 1px;
        background-color: #333;
    }
    .option_button a:hover {
        background-color: #fa8b1b;
    }

    .center{
        text-align: center;
    }
    .choice{
        text-align: center;
        display: inline-block;
    }
    .choice > a {
        color: white;
        float: left;
        padding-top: 8px;
        width: 40em;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        border-radius: 11px;
        margin: 2px 1px;
        background-color: #333;
        font-size: 0.9em;
    }
    .choice a:hover {
        background-color: #fa8b1b;
    }
</style>

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



@endsection