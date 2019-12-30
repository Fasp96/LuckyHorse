@extends('layouts.head_footer')

@section('content')

<style>
    img{
        float:right;
        
        
    }
    
    h1{
    color: green;
    font-weight:bold; 
    }

    h2{
        color:red;
        font-weight:bold;
    }

    h5{
        margin-left: 2em;
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
</style>

<h1 align="center">Tournaments</h1>

@foreach($tournaments as $tournament) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Tournaments</div> -->
                <div class="card-header"><h2>{{$tournament->name}}</h2></div>
                <div class="card-body">
                    <img src="{{ $tournament->file_path}}" alt="tournament_img" style="width:40%;opacity:0.85;">
                    
                    Date: {{date('d-m-Y', strtotime($tournament->date))}}<br>
                    Time: {{date('H:i:s', strtotime($tournament->date))}}<br>
                    Description: {{$tournament->description}}<br>
                    Location: {{$tournament->location}}<br><br>
                    
                    <h3>Races in this tournament:</h3>
                    <ul>
                    @foreach($races as $race)
                    <?php
                        if($tournament->id == $race->tournament_id){
                            echo "<li> {$race->name} in {$race->location} </li>";
                            
                        }
                        else{
                            echo "no races to this tournament <br>";
                        }
                    
                    ?>
                    @endforeach
                    </ul>    
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
      <a href="/tournaments_page={{$page_number-1}}">&laquo;</a>
    @endif
    @if($pages_total<7)
      <a href="/tournaments_page=1" @if($page_number==1) class="active" @endif>1</a>
      @if($pages_total>1)
        <a href="/tournaments_page=2" @if($page_number==2) class="active" @endif>2</a>
        @if($pages_total>2)
          <a href="/tournaments_page=3" @if($page_number==3) class="active" @endif>3</a>
          @if($pages_total>3)
            <a href="/tournaments_page=4" @if($page_number==4) class="active" @endif>4</a>
            @if($pages_total>4)
              <a href="tournaments_page=5" @if($page_number==5) class="active" @endif>5</a>
              @if($pages_total>5)
                <a href="tournaments_page=6" @if($page_number==6) class="active" @endif>6</a>
              @endif
            @endif
          @endif
        @endif
      @endif
      @if($pages_total==$page_number)
        <a href="">&raquo;</a>
      @else
        <a href="/tournaments_page={{$page_number+1}}">&raquo;</a>
      @endif
    @elseif($page_number<5)
    <a href="/tournaments_page=1" @if($page_number==1) class="active" @endif>1</a>
    <a href="/tournaments_page=2" @if($page_number==2) class="active" @endif>2</a>
    <a href="/tournaments_page=3" @if($page_number==3) class="active" @endif>3</a>
    <a href="/tournaments_page=4" @if($page_number==4) class="active" @endif>4</a>
    <a href="/tournaments_page=5">5</a>
    <a href="/tournaments_page=6">6</a>
    <a href="/tournaments_page={{$page_number+1}}">&raquo;</a>
    @elseif($page_number<($pages_total-1))                 
      <a href="/tournaments_page={{$page_number-3}}">{{$page_number-3}}</>
      <a href="/tournaments_page={{$page_number-2}}">{{$page_number-2}}</a>
      <a href="/tournaments_page={{$page_number-1}}">{{$page_number-1}}</a>
      <a href="/tournaments_page={{$page_number}}" class="active">{{$page_number}}</a>
      <a href="/tournaments_page={{$page_number+1}}">{{$page_number+1}}</a>
      <a href="/tournaments_page={{$page_number+2}}">{{$page_number+2}}</a>
      <a href="/tournaments_page={{$page_number+1}}">&raquo;</a>
    @else
      <a href="/tournaments_page={{$pages_total-5}}">1</>
      <a href="/tournaments_page={{$pages_total-4}}">{{$pages_total-4}}</a>
      <a href="/tournaments_page={{$pages_total-3}}">{{$pages_total-3}}</a>
      <a href="/tournaments_page={{$pages_total-2}}">{{$pages_total-2}}</a>
      <a href="tournaments_page={{$pages_total-1}}" @if($page_number==$pages_total-1) class="active" @endif>{{$pages_total-1}}</a>
      <a href="/tournaments_page={{$pages_total}}" @if($page_number==$pages_total) class="active" @endif>{{$pages_total}}</a>
      <a href="">&raquo;</a>
    @endif
  </div>
</div>

@endsection