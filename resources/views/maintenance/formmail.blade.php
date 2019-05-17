
@extends('layouts.navside') 
@section('title','จัดการฐานข้อมูล')
@section('content')
 <div class="container">
<div class="row"> 
<div class="col-md-12"> <br /> 
<h3 align="center">Send Email</h3> <br/> 

@if(count($errors) > 0) 
<div class="alert alert-danger"> 
<ul> @foreach($errors->all() as $error) 
<li>{{$error}}</li> 
@endforeach 
</ul> 
</div> 
@endif 

@if(\Session::has('success')) 
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif 

<form method="post" action="{{action('MainMailController@post')}}">{{csrf_field()}}  
<div class="form-group"> 
<label>Email</label>
      <input type="text" name="email" class="form-control">
      </div>
<div class="form-group"> 
<label>Subject</label>
<input type="text" name="subject" class="form-control"/>
</div> 

 <!-- <div class="form-group"> 
<label>CC</label>
<input type="text" name="cc" class="form-control" /> 
</div> -->
 
<div class="form-group"> 
<label>Message</label>
<textarea type="text" name="message" class="form-control" row="8"></textarea> 
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
