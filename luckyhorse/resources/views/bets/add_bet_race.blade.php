@extends('layouts.add_bet')

@section('bet_type')
<!-- Race bet form information -->
Race Name<br>
<input id="name" type="text" class="form-control" name="name" value="{{$race->name}}" disabled><br>
Date<br>
<input id="date" type="date" class="form-control" name="date" value="{{date('Y-m-d', strtotime($race->date))}}" disabled><br>

@endsection