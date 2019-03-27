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
<td>{{$row['statusCheck']}} </td>
<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 	update
</button> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <form method="post" action=""> {{csrf_field()}}
	      <div class="modal-body">
				@include('user.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div> </td>




<td><form method="post"  class="Checkdelete" 
 action="{{action('dataController@destroy', $row['id'])}}"> {{csrf_field()}} 
<input type="hidden" name="_method" value="DELETE" /> 
<button type="submit" class="btn btn-danger">Delete</button> 
</form> 
</td>
<td><a href="{{action('dataController@downloadPDF', $row['id'])}}" class="btn btn-warning">PDF</a>
</td>
</tr> 
@endforeach 
</table>
{{$showdata->links()}}  <!-- กด เลขหน้า -->




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



