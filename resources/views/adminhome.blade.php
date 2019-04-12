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
                <a href="{{ url('/Check') }}"class="btn btn-primary">Check Data</a>
                
                <a href="{{ url('/Role') }}"class="btn btn-defualt">Update role => พนักงาน</a>
            </div>
        </div>
    </div>
</div>
@endsection
