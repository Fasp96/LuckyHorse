
@extends('layouts.head_footer')

@section('content')

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<style>
img {
  float: right;
}

h2{
        color: red;
        font-weight:bold; 
    }

.button {
  background-color: #F0E68C;
  border: none;
  color: black;
  padding: 15px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 50%;
  height: 50px;

margin-left: 350px;
}

</style>

</head>

<body>

<h1 align="center">Horses</h1>
@foreach($horses as $horse)
                    
    <div class="button-container">
        <button class = "button" id="{{$horse->id}}"><h2>{{$horse->name}}</h2></button>
     </div>

<br>

@endforeach

<script>
        $("body").on( "click", ".button-container button",function(){
        //var y = $(this).text();
        var x = $(this).attr('id');
        
        location.replace("http://localhost:8000/horses/" + x);   
    });

</script>

</body>
@endsection

