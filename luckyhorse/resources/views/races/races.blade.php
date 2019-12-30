@extends('layouts.head_footer')

@section('content')

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
    img {
        float:right;
    }
    table, td {
        border: 2px solid black;
        border-collapse: collapse;
        background-color: #FFE4C4;
    }
    th{
        color: white;
        border: 2px solid black;
        border-collapse: collapse;
        background-color: grey;
    }
    h4{
        color: green;
        font-weight:bold;
    }
    
    h1{
        color: green;
        font-weight:bold; 
    }

    h2{
        color: red;
        font-weight:bold; 
    }

    /*Pagination*/
    .center {
        text-align: center;
    }
    .pagination {
        display: inline-block;
    }
    .pagination a {
        color: white;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #333;
        margin: 0 1px;
        background-color: #333;
    }
    .pagination a.active {
        background-color: #fa8b1b;
        color: white;
        border: 1px solid #fa8b1b;
    }
    .pagination a:hover:not(.active) {
        background-color: #939393;
    }

    h3{
        color: white;
         
    }

    .button {
        background-color:#323232;
        border: none;
        padding: 15px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        width: 99%;
        height: 50px;
        
    }

    .button:hover {
        background-color: orange;
        color: white;
    }
</style>
    

</head>

<body>
<h1 align="center">Races</h1>

@foreach($races as $race)


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--   <div class="card-header"> <h2>{{$race->name}}</h2></div>  -->

                
                    <div id="body-card">

                    <div class="button-container">
                        <button class="button" id="{{$race->id}}"><h3>{{$race->name}}</h3></button> 
                    </div>

                        <div class="card-body">
                            <img src="{{ $race->file_path}}" alt="race_img" style="width:30%;opacity:0.85;">
                            
                            
                            Date: {{date('d-m-Y', strtotime($race->date))}}<br>
                            Description: {{$race->description}}<br>
                            Local: {{$race->location}}<br>

                            @foreach($tournaments as $tournament)

                            <?php 
                            if($race->tournament_id == $tournament->id){ 
                                echo "Tournament: {$tournament->name}<br><br>";  
                            }else{
                                echo "no tournament to this race<br><br>";
                            }
                            ?>
                            @endforeach
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endforeach

<!--Pagination-->
<div class="center">
  <div class="pagination">
    @if($page_number==1)
      <a href="">&laquo;</a>
    @else
      <a href="/races_page={{$page_number-1}}">&laquo;</a>
    @endif
    @if($pages_total<7)
      <a href="/races_page=1" @if($page_number==1) class="active" @endif>1</a>
      @if($pages_total>1)
        <a href="/races_page=2" @if($page_number==2) class="active" @endif>2</a>
        @if($pages_total>2)
          <a href="/races_page=3" @if($page_number==3) class="active" @endif>3</a>
          @if($pages_total>3)
            <a href="/races_page=4" @if($page_number==4) class="active" @endif>4</a>
            @if($pages_total>4)
              <a href="races_page=5" @if($page_number==5) class="active" @endif>5</a>
              @if($pages_total>5)
                <a href="races_page=6" @if($page_number==6) class="active" @endif>6</a>
              @endif
            @endif
          @endif
        @endif
      @endif
      @if($pages_total==$page_number)
        <a href="">&raquo;</a>
      @else
        <a href="/races_page={{$page_number+1}}">&raquo;</a>
      @endif
    @elseif($page_number<5)
    <a href="/races_page=1" @if($page_number==1) class="active" @endif>1</a>
    <a href="/races_page=2" @if($page_number==2) class="active" @endif>2</a>
    <a href="/races_page=3" @if($page_number==3) class="active" @endif>3</a>
    <a href="/races_page=4" @if($page_number==4) class="active" @endif>4</a>
    <a href="/races_page=5">5</a>
    <a href="/races_page=6">6</a>
    <a href="/races_page={{$page_number+1}}">&raquo;</a>
    @elseif($page_number<($pages_total-1))                 
      <a href="/races_page={{$page_number-3}}">{{$page_number-3}}</>
      <a href="/races_page={{$page_number-2}}">{{$page_number-2}}</a>
      <a href="/races_page={{$page_number-1}}">{{$page_number-1}}</a>
      <a href="/races_page={{$page_number}}" class="active">{{$page_number}}</a>
      <a href="/races_page={{$page_number+1}}">{{$page_number+1}}</a>
      <a href="/races_page={{$page_number+2}}">{{$page_number+2}}</a>
      <a href="/races_page={{$page_number+1}}">&raquo;</a>
    @else
      <a href="/races_page={{$pages_total-5}}">1</>
      <a href="/races_page={{$pages_total-4}}">{{$pages_total-4}}</a>
      <a href="/races_page={{$pages_total-3}}">{{$pages_total-3}}</a>
      <a href="/races_page={{$pages_total-2}}">{{$pages_total-2}}</a>
      <a href="races_page={{$pages_total-1}}" @if($page_number==$pages_total-1) class="active" @endif>{{$pages_total-1}}</a>
      <a href="/races_page={{$pages_total}}" @if($page_number==$pages_total) class="active" @endif>{{$pages_total}}</a>
      <a href="">&raquo;</a>
    @endif
  </div>
</div>
<script>
        $("body").on( "click", ".button-container button",function(){
        //var y = $(this).text();
        var x = $(this).attr('id');
        
        location.replace("http://localhost:8000/races/" + x);   
    });

</script>

</body>
@endsection

