@extends('layouts.navside') 
@section('content')
<div class="text-center">
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800 mb-5">คุณไม่มีสิทธิ์ใช้งาน</p>
             <p class="text-gray-500 mb-0">กรุณาใช้งานหน้าอื่น</p>
            <a href="{{url('/')}}"> Back to Home</a>
          </div>
        </div>
@endsection