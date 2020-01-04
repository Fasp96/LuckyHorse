@extends('layouts.head_footer')

@section('content')

<style>
    .ad_container{
        width: 100%;
        padding: 10px;
    }
    .ad_img{
        width: 100%;
    }
</style>

<!--Last Results Tables-->
<div id="last_results_tables">
    @foreach($table_infos as $table_info)
        <table class="result_table">
            <caption class="tab_title">
                <div><a href="/races/{{$table_info[0]->race_id}}">{{$table_info[0]->race_name}}</a></div>
                <div>({{date('d-m-Y', strtotime($table_info[0]->date))}})</div>
            </caption>
            <tr class="tab_tags">
                <td></td>
                <td>Horse</td>
                <td class="table_center_element">Jockey</td>
                <td>Time</td>
            </tr>
            <?php $count = 1 ?>
            @foreach($table_info as $result)
                <tr class="tab_result">
                    <td class="tab_position">{{$count}}</td>
                    <td><a href="/horses/{{$result->race_id}}">{{$result->horse_name}}</a></td>
                    <td><a href="/jockeys/{{$result->jockey_id}}">{{$result->jockey_name}}</a></td>
                    <td>{{$result->time}}</td>
                    <?php $count++ ?>
                </tr>
            @endforeach
        </table>
    @endforeach
</div>
<hr>
<!--Tables floating at the right-->
<div id="float_tables">
    <!--Future Tournaments Table-->
    <div class="float_table">
        <div class="tab_title">
            Tournaments
        </div>
        <div class="tab_content">
        @foreach($tournaments as $tournament)
            <div class="title">
                {{date('d-m-Y', strtotime($tournament->date))}} <br>
            </div>
            <div class="info">
                <a href="/tournaments/{{$tournament->id}}">{{$tournament->name}}</a>
            - {{date('H:i:s', strtotime($tournament->date))}} 
            - {{$tournament->location}}<br>
            </div>
        @endforeach
        </div>
    </div>
    <!--Future Races Table-->
    <div class="float_table">
        <div class="tab_title">
            Races
        </div>
        <div class="tab_content">
        @foreach($races as $race)
            <div class="title">
                {{date('d-m-Y', strtotime($race->date))}}<br>
            </div>
            <div class="info">
                <a href="/races/{{$race->id}}">{{$race->name}}
                - {{date('H:i:s', strtotime($race->date))}}
                - {{$race->location}}</a><br>
            </div>
        @endforeach
        </div>
    </div>
    <!--Last Minutes News Table-->
    <div class="float_table">
        <div class="tab_title">
            Last Minute News
        </div>
        <div class="tab_content">
        @foreach($news as $new)
            <div class="title">
                {{$new->created_at->format('d-m-Y')}}<br>
            </div>
            <div class="info">
                <a href="/news/{{$new->id}}">{{$new->minute_info}}</a><br>
            </div>
        @endforeach
        </div>
    </div>
    <br>
    <div class="ad_container">
        <img class="ad_img" src="/img/ad/snicker_ad.png" alt="ad">
    </div>
    <div class="ad_container">
        <img class="ad_img" src="/img/ad/olay_ad.jpg" alt="ad">
    </div>
    <div class="ad_container">
        <img class="ad_img" src="/img/ad/flash_sales_ad.png" alt="ad">
    </div>
    <div class="ad_container">
        <img class="ad_img" src="/img/ad/evadav_ad.png" alt="ad">
    </div>
    <div class="ad_container">
        <img class="ad_img" src="/img/ad/snicker_ad.png" alt="ad">
    </div>
    <div class="ad_container">
        <img class="ad_img" src="/img/ad/olay_ad.jpg" alt="ad">
    </div>
</div>
<h1 class="last_news_title">Last News</h1>
<div class="News">
    @foreach($news as $new)
        <div class="news_container">
            <a href="/news/{{$new->id}}">
                <div class="news_img" style='background-image: url("{{$new->file_path}}");'>
                    <div>{{$new->title}}</div>
                </div>
            </a> 
        </div>
    @endforeach
</div>

@endsection
