@extends('layouts.add_bet')

@section('bet_type')
<!-- Tournament bet form information -->
Tournament Name<br>
<input id="name" type="text" class="form-control" name="name" value="{{$tournament->name}}" disabled><br>
Date<br>
<input id="date" type="date" class="form-control" name="date" value="{{date('Y-m-d', strtotime($tournament->date))}}" disabled><br>

@endsection