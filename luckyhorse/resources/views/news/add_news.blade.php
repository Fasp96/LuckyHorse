@extends('layouts.head_footer')

@section('content')

<!-- JS file to validate all fields -->
<script src="{{asset('js/add_news/news_validator.js')}}" defer></script>

<!-- List the last 10 news added -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News</div>
                <div class="card-body">
                    <ul>
                        @foreach($news as $news) 
                            <li>{{$news->titulo}} - {{$news->minute_info}}</li>                    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- Container of the form to add a news -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New News</div>
                <div class="card-body">
                    <!-- Form to add a news -->
                    <form id ="news_form" method ="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Title
                        <input id="title" type="text" class="form-control" name="title" onchange="validate_input()"><br>
                        Abstract (max. 120 characters)<br>
                        <textarea id="abstract" class="form-control" name="abstract" rows="2" cols="40" maxlength="120" onchange="validate_input()"></textarea><br>
                        Description<br>
                        <textarea id="description" class="form-control" name="description" rows="5" cols="80" onchange="validate_input()"></textarea><br>
                        News Photo <br><br>
                        <input id="news_photo" type="file" name="news_photo" accept="image/*" onchange="validate_input()"><br>
                        <br>
                        <!-- Placeholder for the button after everything is validated -->
                        <div id="form_end"></div>
                    </form>
                    <button id="add_news_btn" class="btn btn-primary">Add News</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection