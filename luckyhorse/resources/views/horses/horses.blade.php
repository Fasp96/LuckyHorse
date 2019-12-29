
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

</style>

</head>

<body>

<h1 align="center">Horses</h1>
@foreach($horses as $horse)
    <div class="button-container">
        <button> {{$horse->id}}</button>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    

                    
                    <div class="card-header"> <h2>{{$horse->name}}</h2></div>


                    <div class="card-body">
                        
                            <img src="{{ $horse->file_path}}" alt="horse_img" style="width:50%;opacity:0.85;">
                            
                                Breed: {{$horse->breed}}<br>
                                Birth Date: {{$horse->birth_date}}<br>
                                Gender: {{$horse->gender}}<br>
                                Number of Races: {{$horse->num_races}}<br>
                                Number of Victories: {{$horse->num_victories}}<br>

                            
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>

@endforeach

<script>
        $("body").on( "click", ".button-container button",function(){
        //alert( "triggered by "+ $(this).text() );
        //var hello = $(this).text();
        location.replace("http://localhost:8000/horses/" +$(this).text() );
    });
</script>

</body>
@endsection

