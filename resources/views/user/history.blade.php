@extends('layouts.navside') 
@section('content')
<div class="container" align="right">
@foreach($s1 as $row)
<h5> <i class="fa fa-users" aria-hidden="true"></i> จำนวนคิวมีทั้งหมด {{$row->number}} คิว</h5>
@endforeach

 <?php
// foreach($s1 as $row)
//  echo ($row->number - 1);
?>
</div>
<br>
<div class="container">
@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
            <div class="alert alert-success"> 
            <p>{{ \Session::get('success') }}</p> 
            </div> 
            @endif 
            </div>

<div class="container">
 
<table class="table table-bordered table-striped"> 
<tr>
    <th>รหัสแจ้งซ่อม /ผลิตภัณฑ์</th> 
    <th>อุปกรณ์ /ปัญหา</th>
    <th>เวลารับซ่อม /รับซ่อม</th>
    <th>เวลาคาดว่าจะได้รับ</th>
    <th>สถานะ</th>
    <th>รายละเอียด </th>
</tr>

@foreach($history as $row)

<tr> 
    <td>{{$row['id']}} <br> <p style="color:blue;"> {{$row['productCode']}}</td>  
	<td>{{$row->typeCheck->type_name}}  <br> <div style="color:red;">{{$row['problem']}}</div></td> 
	<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> 
        <p style="color:green;">
        @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
        @else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
        <td> <div style="color:#7DC182;">@if ($row['pro_return']=='') รอการยืนยัน
        @else {{date('d/M/Y',strtotime($row['pro_return']))}} @endif </div> </td>
	<td>{{$row->statusCheckname->status}}</td>  
    <td><a href="{{action('UserInsertRepairController@process',$row['id'])}}">รายละเอียด</a></td>
</tr>

@endforeach
</table> 
{{$history->links()}}
 </div>

</div>
@stop
