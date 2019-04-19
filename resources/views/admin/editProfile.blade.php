@extends('layouts.nav') 
@section('title','Home')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br>
<h3 align="center"> My Profile </h3> <br /> 

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif



@foreach($users as $row) 

  @if ($row['name']==Auth::user()->name) 

<div class="container">
<div class="row">
   <div class="col-md-10 col-md-offset-1">
   <img src="/uploads/avatars/{{$row->avatar}}" style="width : 250px; hight:250px; float: left;
   border-radius:50%; margin-right:50px;">
  </div>
  </div> 
   </div> 
   <br><br>

   <div class="form-group">
   <label> ชื่อ - นามสกุล : {{$row['name']}}</label>
   <a type="้hidden" name="name" ></a>
   </div> 

   <div class="form-group">
   <label> แผนกงาน : {{$row['department']}}</label>
   <a type="้hidden" name="name" ></a>
   </div> 

   <div class="form-group">
   <label> E-mail : {{$row['email']}}</label>
   <a type="้hidden" name="name" ></a>
   </div> 

   <div class="form-group">
   <label> สถานะ : {{$row->adminChecktest->role}}</label>
   <a type="้hidden" name="name" ></a>
   </div> 
   
    <button class="btn btn-warning"  data-toggle="modal" data-target="#ii{{ $row['id']}}">Edit your profile</button> 
<div class="modal modal-danger fade" id="ii{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
          <form method="post" action="{{action('editProfileController@update',$row['id'])}}">{{csrf_field()}}  
	  <input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
			<p class="text-center">
			<label>ชื่อ - นามสกุล </label>
			<input type="text"  name="name" value="{{$row['name']}}"> <br>
			</p>
                        <p class="text-center">
			<label>แผนกงาน </label>
			<input type="text"  name="department" value="{{$row['department']}}"> <br>
			</p>
                        <p class="text-center">
			<label>E-mail</label>
			<input type="text"  name="email" value="{{$row['email']}}"> <br>
			</p>

	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-danger">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div> @endif


@endforeach
<div align="right"> 
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>
</div>
</div> 
@stop
