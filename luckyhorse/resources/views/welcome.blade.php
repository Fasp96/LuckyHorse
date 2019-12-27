@extends('layouts.head_footer')

@section('content')

<style>
    /*Float Tables*/
    #float_tables{
        float:right;
        color: white;
        width: 150px;
    }
    #float_tables [class="float_table"]{
        margin: 10px;
    }
    #float_tables [class="tab_title"]{
        background-color: #fa8b1b;
        border: 1px solid black;
    }
    #float_tables [class="tab_content"]{
        max-height: 190px;
        overflow: auto;
    }
    #float_tables [class="title"]{
        background-color: #333;
        border: 1px solid black;
    }
    #float_tables [class="info"]{
        background-color: grey;
        border: 1px solid black;
    }

    /*Results Tables*/
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
    .news_image{
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 250px;
        margin: 30px;
        margin-right: 150px;
    }
    .news_title{
        position: absolute;
        bottom: 0;
    }


    .block{
        display: block !important;
        padding-top: 70%;
        margin: 0;
        position: relative;
        width: 100%;
        box-sizing: border-box;
    }
    .entry_card_image{
        display: block;
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
    }
    .entry_card_text{
        width: 100%;
        padding: 0.75em;
        position: absolute;
        left: 0;
        bottom: 0;
    }


    .css_image{
        position: relative;
        box-sizing: border-box;
        width: max-content;
        margin-left: 20%;
    }
    .css_text{
        position: absolute; 
        bottom: 10%; 
        left: 0; 
        width: 100%;
        word-wrap: break-word;
    }
    .css_image > img{
        height: 220px;
    }

    .overview {
        display: flex;
        justify-content: space-around;
        height: auto;
    }

    .overview_content {
        margin: 10px;
        margin-right: 170px;
        position: relative;
        height: 300px;
    }

    .overview_content div {
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
    <div class="float_table">
        <div class="tab_title">
            Tournaments
        </div>
        <div class="tab_content">
        @foreach($tournaments as $tournament)
            <div class="title">
                date: {{$tournament->date}}<br>
            </div>
            <div class="info">
                name: {{$tournament->name}}<br>
            </div>
        @endforeach
        </div>
    </div>
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
</div>
<div class="News">
    <!--
    @foreach($news as $new)
    <div>
        <div class="news_image" style='background-image: url("{{$new->file_path}}");'>

        </div>
        <div class="news_title">
            {{$new->titulo}}
        </div>
    </div>
    @endforeach
    -->
    <!--
    @foreach($news as $new)
        <div class="block">
            <a class="entry_card_image" href="">
                <img src="{{$new->file_path}}" alt="">
            </a>
            <div class="entry_card_text">
                {{$new->titulo}}
            </div>
            
        </div>
    @endforeach
    -->
    <!--
    @foreach($news as $new)
        <div class="css_image">
            <img src="{{$new->file_path}}" alt="">
            <div class="css_text">
                    {{$new->titulo}}
            </div>
        </div>
    @endforeach
    -->
    <div class="overview_content">
        <img src="https://apollo-ireland.akamaized.net/v1/files/eyJmbiI6Ijk4aWtrNHFveW8xeDItU1REVlRMUFQiLCJ3IjpbeyJmbiI6IjZtZ2p3bHA3a2dkYjItU1REVlRMUFQiLCJzIjoiMTYiLCJwIjoiMTAsLTEwIiwiYSI6IjAifV19.qTQKIYNUtF6UjYisKBLIS1XdIvZxfdJUETYfn3dTwlY/image;s=1080x720;cars_;/112410906_;slot=1;filename=eyJmbiI6Ijk4aWtrNHFveW8xeDItU1REVlRMUFQiLCJ3IjpbeyJmbiI6IjZtZ2p3bHA3a2dkYjItU1REVlRMUFQiLCJzIjoiMTYiLCJwIjoiMTAsLTEwIiwiYSI6IjAifV19.qTQKIYNUtF6UjYisKBLIS1XdIvZxfdJUETYfn3dTwlY_rev001.jpg"
            alt="" width="100%" height="100%">
        <div>Mother of God: The Next Honda Civic Type R Looks Absolutely Insane</div>
    </div>
</div>


<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolorem commodi! Quibusdam recusandae quidem atque aperiam eius quas laboriosam tenetur autem illo est. Sint itaque, quos quisquam rerum architecto omnis!</p>

@endsection
