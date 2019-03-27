@extends('user.master') 
@section('title','Home')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br>
<h3 align="center"> history</h3> <br /> 
<table class="table table-bordered table-striped"> 
<tr>
<th>รหัสผลิตภัณฑ์</th> 
<th>สาเหตุ/ปัญหา</th>
<th>ประเภท</th>
<th>สถานะ</th>
<th>ชื่อผู้รับซ่อม</th> 
<th>วิธีการแก้ไขปัญหา</th> 
<th>หมายเหตุ</th>
<th>erere</th>
</tr> 
@foreach($history as $row) 
@if  ($row['name']==Auth::user()->name) 
<tr>
    <td>{{$row['productCode']}}</td> 
    <td>{{$row['problem']}}</td>
    <td>{{$row['type_id']}}</td>
    <td>{{$row->statusCheckname->status}}</td>
    <td>{{$row['repairman']}}</td>
    <td>{{$row['method']}}</td>
    <td>{{$row['remark']}}</td>
    <td> @if ($row['statusCheck']==5)
    <a href="{{action('dataController@edit', $row['id'])}}" class="btn btn-primary">รอการยอมรับการซ่อมจากผู้แจ้งซ่อม</a></td>
    @elseif ($row['statusCheck']==7) <!-- อยู่ระหว่างการดำเนินการ -->
<a href="{{action('dataController@edit', $row['id'])}}" class="btn btn-primary">รอคิว</a>
    @endif

</tr>
@endif
@endforeach
</table> 
<div align="right"> 
<a href="{{url('/')}}" class="btn btn-primary">back</a> 
</div>
</div>
</div> 
@stop
