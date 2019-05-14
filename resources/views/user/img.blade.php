@extends('layouts.side') 
@section('title','จัดการฐานข้อมูล')
@section('content')
 <div class="container">
 <br>

@if(count($errors) > 0) 
<div class="alert alert-danger"> 
<ul> @foreach($errors->all() as $error) 
<li>{{$error}}</li> 
@endforeach 
</ul> 
</div> 
@endif 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
            <div class="alert alert-success"> 
            <p>{{ \Session::get('success') }}</p> 
            </div> 
            @endif 
                <div class="card-header">Insert Data</div>

                <div class="card-body">
                    <form method="post" action="{{url('/uploadfile')}}" >
                        {{ csrf_field() }}
                        <div class="form-group">
                        <table class="table">
                            <tr>
                            <td width="40%" align="right"><label> เลือกไฟล์เพื่ออัพโหลด </label></td>
                            <td width="30"><input type="file" name="select_image" /></td>
                            <td width="30%" align="left"><input type="submit" name="upload" class="btn btn-primary" value=“อัพโหลด"></td>
                        </tr>
                            <tr>
                            <td width="40%" align="right"></td>
                            <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                            <td width="30%" align="left"></td>
                        </tr>
                        </table>
                        </div>
                 </form>


                </div>
            </div>
        </div>
    </div>
@endsection
