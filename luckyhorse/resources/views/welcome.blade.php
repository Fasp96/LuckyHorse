@extends('layouts.head_footer')

@section('content')

<style>
    #float_tables{
        float:right;
        color: white;
        width: 150px;
    }
    #float_tables [class="float_table"]{
        padding: 1px;
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

</style>

<div></div>

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

<div id="last_results_tables">
    @for ($i = 1; $i < 4; $i++)
        <table class="result_table">
            <caption class="tab_title">
                <div>{{$last_races[$i-1]->name}}</div>
                <div>({{$last_races[$i-1]->date}})</div>
            </caption>
            <tr class="tab_tags">
                <td></td>
                <td>Horse</td>
                <td class="table_center_element">Jockey</td>
                <td>Time</td>
            </tr>
            <?php $count = 1 ?>
            @foreach(${'results_' . $i} as $result)
                <tr class="tab_result">
                    <td class="tab_position">{{$count}}</td>
                    <td>{{$result->horse_name}}</td>
                    <td>{{$result->jockey_name}}</td>
                    <td>{{$result->time}}</td>
                    <?php $count++ ?>
                </tr>
            @endforeach
        </table>
    @endfor
</div>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolorem commodi! Quibusdam recusandae quidem atque aperiam eius quas laboriosam tenetur autem illo est. Sint itaque, quos quisquam rerum architecto omnis!</p>

@endsection
