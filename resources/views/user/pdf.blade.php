<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<title> PDF</title> 
</head> 
<body>
<div align="center">
<img src="https://yt3.ggpht.com/a-/AN66SAzDWKdAj58uAsuMRU_TcD5bPWg7wxL3uOBVvw=s100-mo-c-c0xffffffff-rj-k-no">
<!--<img src="{{('/image/cc.jpg')}}"> -->
</div>

<h1 align="center"> รายงาน การแจ้งซ่อมผลิตภัณฑ์</h1>
<h2 align="center">รายละเอียดของผู้แจ้งซ่อมผลิตภัณฑ์</h2>
<h2>หมายเลขการแจ้ง : {{$PDF->id}}</h2>
<h2>วันที่แจ้ง : {{$PDF->created_at}}</h2>
<h2>รหัสผลิตภัณฑ์ : {{$PDF->productCode}}</h2>
<h2>ผู้แจ้งซ่อม : {{$PDF->name}} แผนกงาน : {{$PDF->department}}</h2>
<h2>สาเหตุ/ปัญหาที่พบ : {{$PDF->problem}}</h2>
<br>

<h2 align="center">รายละเอียดของการซ่อมผลิตภัณฑ์</h2>
<h2 >วันที่ซ่อมผลิตภัณฑ์ : @if ($PDF->created_at==$PDF->updated_at)  </h2> 
@else {{$PDF->updated_at}}
@endif

<h2>ชื่อผู้แก้ไขปัญหา : {{$PDF->repairman}}</h2>
<h2>วิธีการแก้ไขสาเหตุ/ปัญหา :{{$PDF->method}} </h2>
<h2>หมายเหตุ : {{$PDF->remark}} </h2>
<h2 align="center">ลงชื่อ ...............................</h2>
<h2 align="center"> ({{$PDF->name}})</h2>
<h2 align="center"> (ผู้แจ้งซ่อม)</h2>
<h2 align="right">ลงชื่อ ...............................</h2>
<h2 align="right"> ({{$PDF->repairman}})</h2>
<h2 align="right"> (ผู้รับซ่อม)</h2>

</body> 
</html> 
