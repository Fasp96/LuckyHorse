@extends('layouts.head_footer')

@section('content')

<style>
    h1{
        padding-left: 2px;
        margin-top: 25px;
        margin-left: 10px;
        margin-right: 32%;
        background-color: #333;
        border: 1px solid grey;
        color: white;
    }
    #news_tables{
        display: flex;
        justify-content: space-evenly;
        color: white;
    }

    /*Float Tables*/
    #float_tables{
        float:right;
        color: white;
        width: 30%;
    }
    #float_tables [class="float_table"]{
        margin: 10px;
        border-bottom: 1px solid black;
    }
    #float_tables [class="tab_title"]{
        background-color: #fa8b1b;
        border: 1px solid black;
        padding-left: 5px;
        padding-right: 2px;
        font-weight: bold;
    }
    #float_tables [class="tab_content"]{
        max-height: 190px;
        overflow: auto;
    }
    #float_tables [class="title"]{
        background-color: #333;
        border: 1px solid black;
        padding-left: 5px;
        padding-right: 2px;
    }
    #float_tables [class="info"]{
        background-color: grey;
        border: 1px solid black;
        padding-left: 5px;
        padding-right: 2px;
        /*text-align: justify;
        hyphens: auto;*/
    }

    /*Last Results Tables*/
    #last_results_tables{
        display: flex;
        justify-content: space-evenly;
        color: white;
    }
    #last_results_tables [class="result_table"]{
        padding: 1px;
    }
    #last_results_tables [class="tab_title"]{
        background-color: #fa8b1b;
        border: 1px solid black;
    }
    #last_results_tables [class="tab_tags"]{
        background-color: #333;
        border: 1px solid black;
        font-weight: bold;
        padding: 5px;
    }
    #last_results_tables [class="tab_result"]{
        background-color: grey;
        border: 1px solid black;
    }
    #last_results_tables [class="tab_position"]{
        background-color: grey;
        font-weight: bold;
    }
    caption {
        caption-side: top;
        color: white;
        text-align: center;
        padding: 0px;
        font-weight: bold;
    }
    table {
        text-align: center;
    }
    td{
        padding: 3px;
    }

    /*News*/
    .news_img {
        margin: 10px;
        margin-right: 32%;
        position: relative;
        height: 300px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .news_img div {
        position: absolute;
        bottom: 0px;
        background-color: rgba(0, 0, 0, 0.432);
        color: white;
        font-size: 1.8em;
        width: 100%;
    }

</style>

<div id="last_results_tables">
    @foreach($table_infos as $table_info)
        <table class="result_table">
            <caption class="tab_title">
                <div>{{$table_info[0]->race_name}}</div>
                <div>({{$table_info[0]->date}})</div>
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
                    <td>{{$result->horse_name}}</td>
                    <td>{{$result->jockey_name}}</td>
                    <td>{{$result->time}}</td>
                    <?php $count++ ?>
                </tr>
            @endforeach
        </table>
    @endforeach
</div>
<hr>

<div id="float_tables">
    <!--Future Tournaments Table-->
    <div class="float_table">
        <div class="tab_title">
            Tournaments
        </div>
        <div class="tab_content">
        @foreach($tournaments as $tournament)
            <div class="title">
                {{$tournament->date}}<br>
            </div>
            <div class="info">
                {{$tournament->name}} - {{$tournament->date}} - {{$tournament->location}}<br>
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
                {{$race->date}}<br>
            </div>
            <div class="info">
                {{$race->name}}<br>
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
                {{$new->created_at->format('Y-m-d')}}<br>
            </div>
            <div class="info">
                {{$new->minute_info}}<br>
            </div>
        @endforeach
        </div>
    </div>
</div>
    <h1>Last News</h1>
<div class="News">
    @foreach($news as $new)
        <div class="news_img" style='background-image: url("{{$new->file_path}}");'>
            <!--<img src="https://apollo-ireland.akamaized.net/v1/files/eyJmbiI6Ijk4aWtrNHFveW8xeDItU1REVlRMUFQiLCJ3IjpbeyJmbiI6IjZtZ2p3bHA3a2dkYjItU1REVlRMUFQiLCJzIjoiMTYiLCJwIjoiMTAsLTEwIiwiYSI6IjAifV19.qTQKIYNUtF6UjYisKBLIS1XdIvZxfdJUETYfn3dTwlY/image;s=1080x720;cars_;/112410906_;slot=1;filename=eyJmbiI6Ijk4aWtrNHFveW8xeDItU1REVlRMUFQiLCJ3IjpbeyJmbiI6IjZtZ2p3bHA3a2dkYjItU1REVlRMUFQiLCJzIjoiMTYiLCJwIjoiMTAsLTEwIiwiYSI6IjAifV19.qTQKIYNUtF6UjYisKBLIS1XdIvZxfdJUETYfn3dTwlY_rev001.jpg"
                alt="" width="100%" height="100%">-->
            <div>{{$new->titulo}}</div>
        </div>
    @endforeach
</div>

@endsection
