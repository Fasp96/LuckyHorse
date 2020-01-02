@extends('layouts.head_footer')

@section('content')

<script src="{{asset('js/edit_news/news_validator.js')}}" defer></script>
<script src="{{asset('js/edit_news/get_news.js')}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit News {{$id}}</div>
                <div class="card-body">
                    <input id="id_news" type="hidden" value="{{$id}}">
                    
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
                        <div id="form_end"></div>
                    </form>
                    <button id="update_news_btn" class="btn btn-primary">Update News</button>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection