@extends('layouts.nav') 
@section('title','Home')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br>
<h3 align="center"> Role </h3> <br /> 

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif

<table class="table table-bordered table-striped"> 
<tr>
<th>ชื่อ</th>
<th>ตำแหน่ง</th> 
<th>E-mail</th>
<th>Role</th>
<th>ChangeRole</th>

</tr> 
@foreach($users as $row) 
<tr>
    <td>{{$row['name']}}</td> 
	<td>{{$row['department']}}</td>
    <td>{{$row['email']}}</td>
		<td> {{$row->adminChecktest->role}}</td>
    <td> @if ($row['roleCheck']==0)
    <button class="btn btn-primary"  data-toggle="modal" data-target="#m{{ $row['id']}}">Role->maintenance</button> 
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
          <form method="post" action="{{action('AdminRoleController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
					<p class="text-center">
					<label>คุณต้องการเปลี่ยนสถานะเป็นพนักงานหรือไม่ </label>
					<input type="hidden"  name="roleCheck" value="1"> <br>
					</p>
	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-danger">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
@elseif ($row['roleCheck']==1)
<a> IT is Maintenance </a>
@elseif ($row['roleCheck']==2)
<a> IT is Admin </a>
</td> @endif

</tr>
@endforeach
</table> 
<div align="right"> 
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>
</div>
</div> 
@stop
