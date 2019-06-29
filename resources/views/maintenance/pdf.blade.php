<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<title> รายงาน</title> 
</head>

<body>
<h4 align="right"><i>เลขแจ้งซ่อม {{$PDF->id}}</i></h4>
<h1 align="center"><i>รายงานการแจ้งซ่อม</i></h1>
<table>
<tr>
     <th><h3 ><u>รายละเอียดของผู้แจ้งซ่อม</u></h3></th>
     <th></th>
  </tr>
  <br>
  <tr>
     <td><h3> วันที่แจ้ง</h3> </td>
      <td> {{date('d/m/Y',strtotime($PDF->created_at))}}</td>
  </tr>
  <br>
  <tr>
    <td><h3> รหัสผลิตภัณฑ์</h3></td>
    <td>{{$PDF->productCode}} </td>
  </tr>
  <br>
  <tr>
    <td><h3> ประเภทอุปกรณ์</h3></td>
    <td>{{$PDF->typeCheck->device_id}}</td>
  </tr>
  <br>
  <tr>
    <td><h3> สาเหตุ/ปัญหาที่พบ</h3></td>
    <td>{{$PDF->problem}}</td>
  </tr>
  <br>
  <tr>
    <td><h3> ผู้แจ้งซ่อม</h3></td>
     <td>{{$PDF->users->name}}</td>
  </tr>
  <br>
  <tr>
    <td><h3> แผนกงาน</h3></td>
     <td>@if ($PDF->users->department_id==1) ฝ่ายขาย 
            @elseif ($PDF->users->department_id==2) ฝ่ายไอที
            @elseif ($PDF->users->department_id==3) ฝ่ายบุคคล
            @elseif ($PDF->users->department_id==4) ฝ่ายการตลาด
            @elseif ($PDF->users->department_id==5) ฝ่ายบริหาร
            @elseif ($PDF->users->department_id==6) ฝ่ายบัญชี
            @elseif ($PDF->users->department_id==7) ฝ่ายซ่อมบำรุง
            @endif </td>
  </tr>
  <br>
<br>
  <tr > 
     <th><h3><u>รายละเอียดของการซ่อม</u></h3></th>
     <th></th>
  </tr>
  <br>
  <tr >
     <td><h3> สถานะการซ่อม</h3> </td>
      <td>{{$PDF->statusCheckname->status_id}}</td>
  </tr>
  <br>
  <tr>
    <td><h3> วันที่ซ่อมผลิตภัณฑ์ </h3></td>
	<td>@if ($PDF->created_at==$PDF->updated_at) ไม่ได้ดำเนินการ  
        @else {{date('d/m/Y',strtotime($PDF->updated_at))}} @endif</td>
  </tr>
  <br>
  <tr>
     <td><h3> ชื่อผู้ดำเนินการ</h3> </td>
      <td>{{$PDF->repairname->name}}</td>
  </tr>
  <br>
  <tr>
    <td><h3> วิธีการแก้ไขสาเหตุ/ปัญหา</h3></td>
    <td>{{$PDF->method}}</td>
  </tr>
  <br>
  <tr>
    <td><h3> หมายเหตุ</h3></td>
     <td>{{$PDF->remark}}</td>
  </tr>
<br><br>
<br><br>
<br><br>
<br><br>
<tr>
      <th><h2 align="center">ลงชื่อ .............................</h2></th>
      <th><h2 align="center">ลงชื่อ .............................</h2></th>
  </tr>
  <tr>
 
  <td><h3 align="center" >({{$PDF->users->name}})</h3></td>
  <td><h3  align="center">({{$PDF->repairman}})</h3></td>
 
  </tr>
  <tr>
  <td><h3 align="center">(ผู้แจ้งซ่อม)</h3></td>
  <td><h3 align="center">(ผู้ดำเนินการซ่อม)</h3></td>
  </tr>
</table>

</body> 
</html> 
