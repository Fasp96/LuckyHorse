@extends('layouts.head_footer')

@section('content')
<style>
    img {
        float: right;
    }

    h2{
        color: red;
        font-weight:bold; 
    }
    
h1{
    color: green;
    font-weight:bold; 
}

    /*News*/
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

<h1 align="center">Jockeys</h1>
@foreach($jockeys as $jockey) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">Jockeys</div> -->
                <div class="card-header"> <h2>{{$jockey->name}}</h2></div>
                <div class="card-body">
                            <img src="{{ $jockey->file_path}}" alt="jockey_img" style="width:40%;opacity:0.85;">
                        
                            Birth Date: {{$jockey->birth_date}}<br>
                            Gender: {{$jockey->gender}}<br> 
                            Number of Races: {{$jockey->num_races}}<br>
                            Number of Victories: {{$jockey->num_victories}}<br>                
                       
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
      <a href="/jockeys_page={{$page_number-1}}">&laquo;</a>
    @endif
    @if($pages_total<7)
      <a href="/jockeys_page=1" @if($page_number==1) class="active" @endif>1</a>
      @if($pages_total>1)
        <a href="/jockeys_page=2" @if($page_number==2) class="active" @endif>2</a>
        @if($pages_total>2)
          <a href="/jockeys_page=3" @if($page_number==3) class="active" @endif>3</a>
          @if($pages_total>3)
            <a href="/jockeys_page=4" @if($page_number==4) class="active" @endif>4</a>
            @if($pages_total>4)
              <a href="jockeys_page=5" @if($page_number==5) class="active" @endif>5</a>
              @if($pages_total>5)
                <a href="jockeys_page=6" @if($page_number==6) class="active" @endif>6</a>
              @endif
            @endif
          @endif
        @endif
      @endif
      @if($pages_total==$page_number)
        <a href="">&raquo;</a>
      @else
        <a href="/jockeys_page={{$page_number+1}}">&raquo;</a>
      @endif
    @elseif($page_number<5)
    <a href="/jockeys_page=1" @if($page_number==1) class="active" @endif>1</a>
    <a href="/jockeys_page=2" @if($page_number==2) class="active" @endif>2</a>
    <a href="/jockeys_page=3" @if($page_number==3) class="active" @endif>3</a>
    <a href="/jockeys_page=4" @if($page_number==4) class="active" @endif>4</a>
    <a href="/jockeys_page=5">5</a>
    <a href="/jockeys_page=6">6</a>
    <a href="/jockeys_page={{$page_number+1}}">&raquo;</a>
    @elseif($page_number<($pages_total-1))                 
      <a href="/jockeys_page={{$page_number-3}}">{{$page_number-3}}</>
      <a href="/jockeys_page={{$page_number-2}}">{{$page_number-2}}</a>
      <a href="/jockeys_page={{$page_number-1}}">{{$page_number-1}}</a>
      <a href="/jockeys_page={{$page_number}}" class="active">{{$page_number}}</a>
      <a href="/jockeys_page={{$page_number+1}}">{{$page_number+1}}</a>
      <a href="/jockeys_page={{$page_number+2}}">{{$page_number+2}}</a>
      <a href="/jockeys_page={{$page_number+1}}">&raquo;</a>
    @else
      <a href="/jockeys_page={{$pages_total-5}}">1</>
      <a href="/jockeys_page={{$pages_total-4}}">{{$pages_total-4}}</a>
      <a href="/jockeys_page={{$pages_total-3}}">{{$pages_total-3}}</a>
      <a href="/jockeys_page={{$pages_total-2}}">{{$pages_total-2}}</a>
      <a href="jockeys_page={{$pages_total-1}}" @if($page_number==$pages_total-1) class="active" @endif>{{$pages_total-1}}</a>
      <a href="/jockeys_page={{$pages_total}}" @if($page_number==$pages_total) class="active" @endif>{{$pages_total}}</a>
      <a href="">&raquo;</a>
    @endif
  </div>
</div>

@endsection