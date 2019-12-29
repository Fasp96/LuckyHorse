@extends('layouts.head_footer')

@section('content')

<style>
  .card-body > img{
    display: block;
    margin: 0 auto;
  }
  .news-description{
    hyphens: auto;
    overflow-wrap: break-word;
    text-align: justify;
  }
  .news-date{
    text-align: right;
    font-size: 0.7rem;
  }

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

@foreach($news as $new)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$new->titulo}}</div> 
                    <div class="card-body">
                        <img src="/{{$new->file_path}}" alt="news_img" style="width:50%;opacity:0.85;">
                        <br>
                        <div class="news-description">
                            {{$new->description}}
                        </div>
                        <br><br>
                        <div class="news-date">
                            Posted at {{$new->created_at->format('d-m-Y')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endforeach
<br>
<div class="center">
  <div class="pagination">
    @if($page_number==1)
      <a href="">&laquo;</a>
    @else
      <a href="/news_page={{$page_number-1}}">&laquo;</a>
    @endif
    @if($pages_total<7)
      <a href="/news_page=1" @if($page_number==1) class="active" @endif>1</a>
      @if($pages_total>1)
        <a href="/news_page=2" @if($page_number==2) class="active" @endif>2</a>
        @if($pages_total>2)
          <a href="/news_page=3" @if($page_number==3) class="active" @endif>3</a>
          @if($pages_total>3)
            <a href="/news_page=4" @if($page_number==4) class="active" @endif>4</a>
            @if($pages_total>4)
              <a href="news_page=5" @if($page_number==5) class="active" @endif>5</a>
              @if($pages_total>5)
                <a href="news_page=6" @if($page_number==6) class="active" @endif>6</a>
              @endif
            @endif
          @endif
        @endif
      @endif
      @if($pages_total==$page_number)
        <a href="">&raquo;</a>
      @else
        <a href="/news_page={{$page_number+1}}">&raquo;</a>
      @endif
    @elseif($page_number<5)
    <a href="/news_page=1" @if($page_number==1) class="active" @endif>1</a>
    <a href="/news_page=2" @if($page_number==2) class="active" @endif>2</a>
    <a href="/news_page=3" @if($page_number==3) class="active" @endif>3</a>
    <a href="/news_page=4" @if($page_number==4) class="active" @endif>4</a>
    <a href="/news_page=5">5</a>
    <a href="/news_page=6">6</a>
    <a href="/news_page={{$page_number+1}}">&raquo;</a>
    @elseif($page_number<($pages_total-1))                 
      <a href="/news_page={{$page_number-3}}">{{$page_number-3}}</>
      <a href="/news_page={{$page_number-2}}">{{$page_number-2}}</a>
      <a href="/news_page={{$page_number-1}}">{{$page_number-1}}</a>
      <a href="/news_page={{$page_number}}" class="active">{{$page_number}}</a>
      <a href="/news_page={{$page_number+1}}">{{$page_number+1}}</a>
      <a href="/news_page={{$page_number+2}}">{{$page_number+2}}</a>
      <a href="/news_page={{$page_number+1}}">&raquo;</a>
    @else
      <a href="/news_page={{$pages_total-5}}">1</>
      <a href="/news_page={{$pages_total-4}}">{{$pages_total-4}}</a>
      <a href="/news_page={{$pages_total-3}}">{{$pages_total-3}}</a>
      <a href="/news_page={{$pages_total-2}}">{{$pages_total-2}}</a>
      <a href="news_page={{$pages_total-1}}" @if($page_number==$pages_total-1) class="active" @endif>{{$pages_total-1}}</a>
      <a href="/news_page={{$pages_total}}" @if($page_number==$pages_total) class="active" @endif>{{$pages_total}}</a>
      <a href="">&raquo;</a>
    @endif
  </div>
</div>

@endsection
