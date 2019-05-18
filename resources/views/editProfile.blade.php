@extends('layouts.navside') 
@section('content')
<br>
<div class="container">
@foreach($editPro as $row) 
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
            <div class="alert alert-success"> 
            <p>{{ \Session::get('success') }}</p> 
            </div> 
            @endif 
                <div class="card-header">My Profile</div>

                <div class="card-body">
                <form method="post" action="{{action('editProfileController@update',$row['id'])}}">{{csrf_field()}}  
	              <input type="hidden" name="_method" value="PATCH"/>
              
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">รหัสพนักงาน</label>
                            <div class="col-md-6">
                            <input type="text" name="id"  class="form-control" value="{{$row['id']}}" disabled />
                            </div>
                        </div>
                  
                        @if (Auth::user()->activated==1)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ชื่อนาม - สกุล </label>
                            <div class="col-md-6">
                            <input type="text" name="name"  class="form-control" value="{{$row['name']}}" required />
                            </div>
                        </div>
                        @elseif (Auth::user()->activated==0)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ชื่อนาม - สกุล </label>
                            <div class="col-md-6">
                            <input type="text" name="name"  class="form-control" value="{{$row['name']}}" disabled />
                            </div>
                        </div>
                        @endif
                      
                        @if (Auth::user()->activated==1)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">แผนกงาน </label>
                            <div class="col-md-6">
                            <input type="text" name="department"  class="form-control" value="{{$row['department']}}" required />
                            </div>
                        </div>
                        @elseif (Auth::user()->activated==0)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">แผนกงาน </label>
                            <div class="col-md-6">
                            <input type="text" name="department"  class="form-control" value="{{$row['department']}}" disabled />
                            </div>
                        </div>
                        @endif
                        @if (Auth::user()->activated==1)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email </label>
                            <div class="col-md-6">
                            <input type="text" name="email"  class="form-control" value="{{$row['email']}}" required />
                            </div>
                        </div>
                        @elseif (Auth::user()->activated==0)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email </label>
                            <div class="col-md-6">
                            <input type="text" name="email"  class="form-control" value="{{$row['email']}}" disabled />
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">สถานะในระบบ </label>
                            <div class="col-md-6">
                            <input type="text" name="role"  class="form-control" value="{{$row->adminChecktest->role}}" disabled />
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button  onclick="check();"  type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button> 
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
