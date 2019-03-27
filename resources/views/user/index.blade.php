@extends('layouts.app') 
@section('title','Home')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br> 
<h3 align="center">Data history</h3> <br /> 
<div align="right"> 
<a href="{{route('user.create')}}" class="btn btn-primary">Add</a> 
<a href="{{route('user.search')}}" class="btn btn-primary">Search</a> 
<br>
</div> 

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif 

<table class="table table-bordered table-striped"> 
<tr>
<th>ID</th> 
<th>รหัสผลิตภัณฑ์</th> 
<th>สาเหตุ/ปัญหาที่พบ</th>
<th>ประเภทอุปกรณ์</th>
<th>ชื่อผู้แก้ไขปัญหา</th>
<th>สถานะการซ่อม</th>
<th>Update</th> 
<th>Delete</th>
<th>PDF</th>

</tr> 
@foreach($showdata as $row) <!-- ดึงข้อมูล showdata ใน fnindex->datacontroller = $row -->
<tr> 
<td>{{$row['id']}}</td> 
<td>{{$row['productCode']}}</td> 
<td>{{$row['problem']}}</td>
<td>{{$row['type_id']}}</td> <!-- ดึงข้อมูล type ใน fn m = typename -->
<td>{{$row['repairman']}}</td>
<td>{{$row->statusCheckname->status}}</td>
<td> @if ($row['statusCheck']==1) <!-- อยู่ระหว่างการรอคิว -->
<a href="{{action('dataController@edit', $row['id'])}}" class="btn btn-primary">1</a>
	@elseif ($row['statusCheck']==2) <!-- อยู่ระหว่างการดำเนินการ -->
<a href="{{action('status2Controller@edit', $row['id'])}}" class="btn btn-primary">2</a>
	@elseif ($row['statusCheck']==3) <!-- รอการยืนยันการซ่อม -->
<a href="{{action('dataController@edit', $row['id'])}}" class="btn btn-primary">3Update</a>
	@elseif ($row['statusCheck']==4) <!-- รอการยืนยันการซ่อมจากผู้ดูแล-->
<a href="{{action('dataController@edit', $row['id'])}}" class="btn btn-primary">4</a>
	@elseif ($row['statusCheck']==6) <!-- การดำเนินการเสร็จสิ้น-->  <!--5 กับ 7 user check -->
<a href="{{action('dataController@edit', $row['id'])}}" class="btn btn-primary">6</a>

</td> @endif
<td>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del">Del</button> 
</td>
<td><a href="{{action('dataController@downloadPDF', $row['id'])}}" class="btn btn-warning">PDF</a>
</td>
</tr> 
@endforeach 
</table>
{{$showdata->links()}}  <!-- กด เลขหน้า -->

<div class="modal modal-danger fade" id="del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form method="post" action="{{action('dataController@destroy', $row['id'])}}">  {{csrf_field()}} 
	  <input type="hidden" name="_method" value="DELETE" /> 
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-danger">Yes Delete</button> 
	      </div>
      </form>
    </div>
  </div>
</div>

</div> 
</div>
<div align="right"> 
<a href="{{url('/')}}" class="btn btn-primary">back</a> 
</div>

<script type="text/javascript">
$(document).ready(function(){ $('.Checkdelete').on('submit', function(){ 
	if(confirm("คุณต้องการลบข้อมูลหรือไม่ ?")) { 
	return true; 
    } 
	else { 
		return false; 
	} 
    }); 
});
</script>
@stop


