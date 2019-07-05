@extends('layouts.navside') 
@section('content')
<div class="container" align="center">
   <h2> ยืนยันการรับอุปกรณ์</h2>
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
    <th>รหัสแจ้งซ่อม</th>
    <th>รหัสผลิตภัณฑ์</th> 
    <th>อุปกรณ์/ปัญหา</th>
    <th>เวลารับซ่อม /คาดว่าจะเสร็จ</th>
    <th>สถานะ</th>
    <th>ยืนยันการซ่อม</th>
    <th>รายละเอียด </th>
</tr>
@foreach($accept as $row)

<tr> 
    <td>{{$row['id']}} </td> 
    <td>{{$row['productCode']}}</td> 
    <td>{{$row->typeCheck->device_id}}: <br> <p style="color:red;">{{$row['problem']}}</p></td>
    <td><div class="text-center" style="color:green;">
        @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
        @else {{date('d/M/Y',strtotime($row['updated_at']))}}@endif</div> 
    <div class="text-center" style="color:Orange;">@if ($row['date_return']=='') รอการยืนยัน
        @else {{date('d/M/Y',strtotime($row['date_return']))}} @endif </div> </td>
    <td>{{$row->statusCheckname->status_id}}</td>
    <td> @include('user/modalUser/acceptPro')</td>
    <td> <a class="btn btn-secondary" href="{{action('UserInsertRepairController@process',$row['id'])}}">
    <i class="fas fa-eye"></i> </a></td>

</tr>

@endforeach
</table> 
{{$accept->links()}}
 </div>
@stop
