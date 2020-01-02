@extends('layouts.head_footer')

@section('content')

<style>
    h2{
        font-weight:bold; 
        color: #333;
    }
    h1{
        font-weight:bold; 
        color: #333;
    }
    .edit_button > a {
        color: white;
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


<h1 align='center'>You claimed {{$bet->value}}€!</h1>



@endsection