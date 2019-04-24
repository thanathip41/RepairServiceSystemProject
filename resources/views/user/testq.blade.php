@extends('layouts.nav') 
@section('content')
<br/>
<div class="container">
@foreach($q as $row)
        {{$row->number}}
        @endforeach
</div>
@stop
