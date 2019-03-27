@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"> </div>
                    @endif

                    @if(Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน dataController -->
                    <div class="alert alert-success"> 
                    <p>{{Session::get('success') }}</p> 
                    </div>
                    @endif
                    <h3>Admin login</h3>
                    Hello {{ Auth::user()->name}}
                </div>
                <a href="{{ url('/user') }}"class="btn btn-primary">Show Data</a>
                <br>
                <a href="{{ url('/charttype') }}"class="btn btn-warning">สรุปผลอุปกรณ์</a>
                <br>
                <a href="{{ url('/chartproblem') }}"class="btn btn-danger">สรุปผลปัญหาต่างๆ</a>
            </div>
        </div>
    </div>
</div>
@endsection
