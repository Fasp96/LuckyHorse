@extends('layouts.head_footer')

@section('content')

<style>
    #Float_Table{
        float:right;
        color: white;
    }
    #Float_Table [class="TB"]{
        padding: 1px;
    }
    #Float_Table [class="TB_Title"]{
        background-color: red;
        border: 1px solid black;
    }
    #Float_Table [class="TB_Content"]{
        border: 1px solid black;
        max-height: 190px;
        overflow: auto;
    }
    #Float_Table [class="Title"]{
        background-color: #333;
    }
    #Float_Table [class="Inf"]{
        background-color: grey;
    }
</style>

<div id="Float_Table">
    <div class="TB">
        <div class="TB_Title">
            Tournaments
        </div>
        <div class="TB_Content">
        @foreach($tournaments as $tournament)
            <div class="Title">
                date: {{$tournament->date}}<br>
            </div>
            <div class="Inf">
                name: {{$tournament->name}}<br>
            </div>
        @endforeach
        </div>
    </div>
    <div class="TB">
        <div class="TB_Title">
            Races
        </div>
        <div class="TB_Content">
        @foreach($races as $race)
            <div class="Title">
                {{$race->date}}<br>
            </div>
            <div class="Inf">
                {{$race->name}}<br>
            </div>
        @endforeach
        </div>
    </div>
</div>



<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolorem commodi! Quibusdam recusandae quidem atque aperiam eius quas laboriosam tenetur autem illo est. Sint itaque, quos quisquam rerum architecto omnis!</p>

@endsection
