
@extends('layouts.navside') 
@section('title','จัดการฐานข้อมูล')
@section('content')
<div class="container">
 <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
            <div class="alert alert-success"> 
            <p>{{ \Session::get('success') }}</p> 
            </div> 
            @endif 
            @if(count($errors) > 0) 
                <div class="alert alert-danger"> 
                <ul> @foreach($errors->all() as $error) 
                <li>{{$error}}</li> 
                @endforeach 
                </ul> 
                </div> 
                @endif 
                <div class="card-header">ส่ง E-Mail</div>

                <div class="card-body">
               
                <form method="post" action="{{action('MainMailController@post')}}">{{csrf_field()}} 
              <br>         
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Email</label>

                            <div class="col-md-8">
                            
                                
                                <input type="text" name="email" class="form-control">
                                
                           
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">หัวข้อ</label>

                            <div class="col-md-8">
                               
                                    
                                    <textarea type="text" name="subject" class="form-control"></textarea>
                                   
                              
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">ข้อความ</label>
                            
                            <div class="col-md-8">
                            <textarea type="text" name="message" class="form-control" rows="8"></textarea> 
                        </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> Send</button> 
                            <button type="reset" class="btn btn-default"> Reset</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
@endsection
