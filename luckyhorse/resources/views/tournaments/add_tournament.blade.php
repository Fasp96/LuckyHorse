@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/jockey_validator.js')}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tournaments</div>

                <div class="card-body">
                    <ul>
                        @foreach($tournaments as $tournament) 
                            <li>{{$tournament->name}}</li>                    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Tournament</div>
                <div class="card-body">
                    
                    <form id ="tournament_form" method ="post" action="" enctype="multipart/form-data">
                        
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Name
                        <input type="text" class="form-control" name="name"><br>
                        Initial Date
                        <input type="date" class="form-control" name="initial_date"><br>
                        Expected Finish Date
                        <input type="date" class="form-control" name="finish_date"><br>
                        Add Races<br>
                        <input type="checkbox" style="color:black;" name="Caminho Palheiro" value="Caminho Palheiro"> Caminho Palheiro 7/8/2020 <br>
                        <input type="checkbox" style="color:black;" name="Santo da Serra" value="Santo da Serra"> Santo da Serra 5/8/2020<br>
                        <input type="checkbox" style="color:black;" name="Porto Santo" value="Porto Santo"> Porto Santo 21/2/2020<br><br>

                        Description<br>
                        <textarea class="form-control" name="description" rows="5" cols="80"></textarea><br>
                        Location
                        <input type="text" class="form-control" name="location"><br>

                        Tournament Photo <br><br>
                        <input type="file" name="tournament_photo" accept="image/*"><br>
                        <br>
                    </form>
                    <button id="add_tournament_btn" class="btn btn-primary">Add Tournament</button>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection