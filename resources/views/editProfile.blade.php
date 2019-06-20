@extends('layouts.navside') 
@section('content')

<div class="container">

  <div class="container">
 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(\Session::has('success')) 
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
                <div class="card-header">My Profile</div>
                <div class="card-body">
                @foreach($editPro as $row) 
                <form method="post" action="{{action('editProfileController@update',$row['id'])}}" enctype="multipart/form-data">{{csrf_field()}}  
	              <input type="hidden" name="_method" value="PATCH"/>
                
                  <div align="center">
                  @if ($row['img']=="") 
                  <img src="{{('/image/user.png')}}" width="220" height="200" style="border-radius: 50%; ">
                  <br>
                  <input type="file" name="img" accept="image/*"/>
                    @else
                 <img src="{{asset('storage').'/'.$row['img']}}" width="220" height="200" style="border-radius: 50%;" >
               <br>
                  <input type="file" name="img" accept="image/*" style="margin-left:15%;margin-top:1% "/>
                  @endif
                  </div>
                  <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">รหัสพนักงาน</label>
                            <div class="col-md-6">
                            <input type="text" name="id"  class="form-control" value="{{$row['id']}}" disabled />
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ชื่อนาม - สกุล </label>
                            <div class="col-md-6">
                            <input type="text" name="name"  class="form-control" value="{{$row['name']}}" required />
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email </label>
                            <div class="col-md-6">
                            <input type="text" name="email"  class="form-control" value="{{$row['email']}}" required />
                            </div>
                        </div> 
                      
                          
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">แผนกงาน </label>
                            <div class="col-md-6">
                            <input type="text" name="department_id"  class="form-control" value="{{$row->departCheck->department_id}}" disabled />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">สถานะในระบบ </label>
                            <div class="col-md-6">
                            <input type="text" name="role"  class="form-control" value="{{$row->userCheck->role_id}}" disabled />
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button   type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endforeach
</div>
</div>
</div> 
@stop
