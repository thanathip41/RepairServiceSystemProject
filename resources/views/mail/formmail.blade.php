
@extends('layouts.nav') 
@section('title','จัดการฐานข้อมูล')
@section('content')
 <div class="container">
<div class="row"> 
<div class="col-md-12"> <br /> 
<h3 align="center">เพิ่มข้อมูล</h3> <br/> 

@if(count($errors) > 0) 
<div class="alert alert-danger"> 
<ul> @foreach($errors->all() as $error) 
<li>{{$error}}</li> 
@endforeach 
</ul> 
</div> 
@endif 

<div align="right">
		<a href="{{url('/history')}}" class="btn btn-primary"  >history</a>
</div>


@if(\Session::has('success')) 
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif 

<form method="post" action="{{action('mailController@post')}}">{{csrf_field()}}  <!-- {{action('mailController@post')}}  /postMail-->
<div class="form-group"> 
<label>email</label>
      <input type="text" name="email" class="form-control">
      </div>
<div class="form-group"> 
<label>S</label>
<input type="text" name="subject" class="form-control"/>
</div> 
<div class="form-group"> 
<label>Message</label>
<input type="text" name="message" class="form-control"  /> 
</div>
 
<div class="form-group"> 
<button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Send</button> 
</div> 
</form> 
</div> 
</div>
<div align="right"> 
<a href="{{url('/')}}" class="btn btn-primary">back</a>  
</div>
@endsection
