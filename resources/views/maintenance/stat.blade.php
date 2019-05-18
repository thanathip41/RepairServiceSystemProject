@extends('layouts.navside') 
@section('title','จัดการฐานข้อมูล')
@section('content')
<div class="container" align="center">   
<h3>สถิติการแจ้งซ่อมคอมพิวเตอร์ อุปกรณ์ต่อพ่วงและระบบเครือข่าย</h3>
</div>
<div class="container">         
<table class="table table-bordered table-striped"> 
    <thead>
    <tr class="table-primary">
        <th >เดือน</th>
        <th>คอมพิวเตอร์</th>
        <th>เครื่องพิมพ์และสแกนเนอร์</th>
        <th>ระบบเครือข่าย</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>มกราคม</td>
        @foreach($id1m1 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m1 as $row)
        <td>{{$row->number}}</td>@endforeach
         @foreach($id3m1 as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
      <tr>
        <td>กุมภาพันธ์</td>
        @foreach($id1m2 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m2 as $row)
        <td>{{$row->number}}</td>@endforeach
         @foreach($id3m2 as $row)
        <td>{{$row->number}}</td>@endforeach
        
      </tr>
      <tr>
        <td>มีนาคม</td>
        @foreach($id1m3 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m3 as $row)
        <td>{{$row->number}}</td>@endforeach
         @foreach($id3m3 as $row)
        <td>{{$row->number}}</td>@endforeach
        
      </tr>
      <tr>
        <td>เมษายน</td>
        @foreach($id1m4 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m4 as $row)
        <td>{{$row->number}}</td>@endforeach
         @foreach($id3m4 as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
      <tr>
        <td>พฤษาคม</td>
        @foreach($id1m5 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m5 as $row)
        <td>{{$row->number}}</td>@endforeach
         @foreach($id3m5 as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
      <tr>
        <td>มิถุนายน</td>
        @foreach($id1m6 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m6 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id3m6 as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
      <tr>
        <td>กรกฏาคม</td>
        @foreach($id1m7 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m7 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id3m7 as $row)
        <td>{{$row->number}}</td>@endforeach
        
      </tr>
      <tr>
        <td>สิงหาคม</td>
        @foreach($id1m8 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m8 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id3m8 as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
      <tr>
        <td>กันยายน</td>
        @foreach($id1m9 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m9 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id3m9 as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
      <tr>
        <td>ตุลาคม</td>
        @foreach($id1m10 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m10 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id3m10 as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
      <tr>
        <td>พฤษจิกายน</td>
        @foreach($id1m11 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m11 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id3m11 as $row)
        <td>{{$row->number}}</td>@endforeach
        
      </tr>
      <tr>
        <td>ธันวาคม</td>
        @foreach($id1m12 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2m12 as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id3m12 as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
      <tr class="table-info">
      @foreach($idAll as $row)
        <td align="center">รวม ({{$row->number}})</td>@endforeach
        @foreach($id1All as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id2All as $row)
        <td>{{$row->number}}</td>@endforeach
        @foreach($id3All as $row)
        <td>{{$row->number}}</td>@endforeach
       
      </tr>
    </tbody>
  </table>
</div>


@endsection