<!-- Layout that permits pagination -->
<div class="center">
  <div class="pagination">
    @if($page_number==1)
      <a href="">&laquo;</a>
    @else
      <a href="/{{$page_name}}_page={{$page_number-1}}">&laquo;</a>
    @endif
    <!-- Case in wich the number of page buttons can vary from 1 to 6 -->
    @if($pages_total<7)
      <a href="/{{$page_name}}_page=1" @if($page_number==1) class="active" @endif>1</a>
      @if($pages_total>1)
        <a href="/{{$page_name}}_page=2" @if($page_number==2) class="active" @endif>2</a>
        @if($pages_total>2)
          <a href="/{{$page_name}}_page=3" @if($page_number==3) class="active" @endif>3</a>
          @if($pages_total>3)
            <a href="/{{$page_name}}_page=4" @if($page_number==4) class="active" @endif>4</a>
            @if($pages_total>4)
              <a href="{{$page_name}}_page=5" @if($page_number==5) class="active" @endif>5</a>
              @if($pages_total>5)
                <a href="{{$page_name}}_page=6" @if($page_number==6) class="active" @endif>6</a>
              @endif
            @endif
          @endif
        @endif
      @endif
      @if($pages_total==$page_number)
        <a href="">&raquo;</a>
      @else
        <a href="/{{$page_name}}_page={{$page_number+1}}">&raquo;</a>
      @endif
    <!-- Case in wich the number of pages is greater than 6 and the user stil hasn't reached the 4th button -->
    @elseif($page_number<5)
    <a href="/{{$page_name}}_page=1" @if($page_number==1) class="active" @endif>1</a>
    <a href="/{{$page_name}}_page=2" @if($page_number==2) class="active" @endif>2</a>
    <a href="/{{$page_name}}_page=3" @if($page_number==3) class="active" @endif>3</a>
    <a href="/{{$page_name}}_page=4" @if($page_number==4) class="active" @endif>4</a>
    <a href="/{{$page_name}}_page=5">5</a>
    <a href="/{{$page_name}}_page=6">6</a>
    <a href="/{{$page_name}}_page={{$page_number+1}}">&raquo;</a>
    <!-- Case in wich the user has reached the 4th button but there are stil more than 2 pages left -->
    @elseif($page_number<($pages_total-1))                 
      <a href="/{{$page_name}}_page={{$page_number-3}}">{{$page_number-3}}</>
      <a href="/{{$page_name}}_page={{$page_number-2}}">{{$page_number-2}}</a>
      <a href="/{{$page_name}}_page={{$page_number-1}}">{{$page_number-1}}</a>
      <a href="/{{$page_name}}_page={{$page_number}}" class="active">{{$page_number}}</a>
      <a href="/{{$page_name}}_page={{$page_number+1}}">{{$page_number+1}}</a>
      <a href="/{{$page_name}}_page={{$page_number+2}}">{{$page_number+2}}</a>
      <a href="/{{$page_name}}_page={{$page_number+1}}">&raquo;</a>
    <!-- Case in wich the user has reached the last 2 pages-->
    @else
      <a href="/{{$page_name}}_page={{$pages_total-5}}">{{$pages_total-5}}</a>
      <a href="/{{$page_name}}_page={{$pages_total-4}}">{{$pages_total-4}}</a>
      <a href="/{{$page_name}}_page={{$pages_total-3}}">{{$pages_total-3}}</a>
      <a href="/{{$page_name}}_page={{$pages_total-2}}">{{$pages_total-2}}</a>
      <a href="{{$page_name}}_page={{$pages_total-1}}" @if($page_number==$pages_total-1) class="active" @endif>{{$pages_total-1}}</a>
      <a href="/{{$page_name}}_page={{$pages_total}}" @if($page_number==$pages_total) class="active" @endif>{{$pages_total}}</a>
      <a href="">&raquo;</a>
    @endif
  </div>
</div>