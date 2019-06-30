<!DOCTYPE html>
<html>
<head>
    <title>รายละเอียด</title>
    <meta chartset="utf-8">

    <link rel="stylesheet" type="text/css" href="{{asset('/css/main.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('/css/bodycolor.css')}}">
    </head>
    <body>
    @if (Auth::user()->deleted==0)
    <br>
        <div class="container">
        <div class="text-center"><h2>หมายเลขการแจ้งซ่อม {{$row['id']}}</h3></div>
        <div class="container">
        <ul class="progressbar">
        @if ($row->status_id==1)
              <li class="active">อยู่ระหว่างการรอคิว</li>
              <li >อยู่ระหว่างการดำเนินการ</li> 
              <li >รอการยืนยันจากผู้แจ้ง</li>
              <li >ดำเนินการเสร็จสิ้น</li>
            @elseif ($row->status_id==2)
              <li class="active">อยู่ระหว่างการรอคิว</li>
              <li class="active">อยู่ระหว่างการดำเนินการ</li> 
              <li >รอการยืนยันจากผู้แจ้ง</li>
              <li >ดำเนินการเสร็จสิ้น</li>
            @elseif ($row->status_id==3)
              <li class="active">อยู่ระหว่างการรอคิว</li>
              <li class="active">อยู่ระหว่างการดำเนินการ</li> 
              <li class="active">รอการยืนยันจากผู้แจ้ง</li>
              <li >ดำเนินการเสร็จสิ้น</li>
            @elseif ($row->status_id==4)
              <li class="active">อยู่ระหว่างการรอคิว</li>    
              <li class="active">อยู่ระหว่างการดำเนินการ</li> 
              <li class="active">รอการยืนยันจากผู้แจ้ง</li>
              <li class="active">ดำเนินการเสร็จสิ้น</li>
              @elseif ($row->status_id==5)
              <li class="fail">อยู่ระหว่างการรอคิว</li>    
              <li class="fail">อยู่ระหว่างการดำเนินการ</li> 
              <li class="fail">รอการยืนยันจากผู้แจ้ง</li>
              <li class="fail">ดำเนินการไม่สมบูรณ์ <br> (รอทำรายการใหม่)</li>
            @elseif ($row->status_id==6)
              <li class="fail">อยู่ระหว่างการรอคิว</li>    
              <li class="fail">อยู่ระหว่างการดำเนินการ</li> 
              <li class="fail">รอการยืนยันจากช่างซ่อม</li>
              <li class="fail">ดำเนินการไม่สมบูรณ์ <br> (เคลมอุปกรณ์)</li>
            @elseif ($row->status_id==7)
              <li class="fail">อยู่ระหว่างการรอคิว</li>    
              <li class="fail">อยู่ระหว่างการดำเนินการ</li> 
              <li class="fail">รอการยืนยันจากช่างซ่อม</li>
              <li class="fail">ดำเนินการไม่สมบูรณ์ <br>(ซื้ออุปกรณ์ใหม่)</li>
            @endif
        </ul>
        </div>
        <a  href="javascript:history.back()" class="close"><h1>&times;</h1></a>
        
        <table class="table table-bordered"> 
          <tr >
            <th class="table-primary">ข้อมูลการแจ้งซ่อม</th>
            <th class="table-primary"></th>
            <th class="table-danger">ข้อมูลการซ่อม</th>
            <th class="table-danger"></th>
          </tr>
          <tr>
            <td>เวลาแจ้งซ่อม</td>
            <td>{{date('d/M/Y',strtotime($row['created_at']))}}</td>
            <td> เวลาดำเนินการ</td>
            <td>@if ($row['created_at']==$row['updated_at'])  ไม่ได้ดำเนินการ
            @else 
            {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</td>
          </tr>
            <tr>
                <td>ประเภทอุปกรณ์ </td>
                <td>{{$row->typeCheck->device_id}}</td>
                <td>เวลาคาดว่าจะเสร็จ</td>
                <td>@if ($row['date_return']=='') รอการยืนยัน
        @else {{date('d/M/Y',strtotime($row['date_return']))}} @endif
       
        </td>
        
                
          <tr>
          <td > รหัสผลิตภัณท์ </td>
            <td>{{$row['productCode']}}</td>
            <td> สถานะการซ่อม  </td>
            <td>{{$row->statusCheckname->status_id}}</td>
          </tr>
           

          </tr>
          <tr>
            <td>สาเหตุ/ปัญหาที่พบ </td>
            <td>{{$row['problem']}}</td>
            <td>วิธีแก้ไขปัญหา</td>
            <td>{{$row['method']}}</td>
            
          </tr>
          <tr >
            <td> ชื่อ-นามสกุล /แผนก   </td>
            <td> {{$row->users->name}} / 
            @if     ($row->users->department_id==1) ฝ่ายขาย 
            @elseif ($row->users->department_id==2) ฝ่ายไอที
            @elseif ($row->users->department_id==3) ฝ่ายบุคคล
            @elseif ($row->users->department_id==4) ฝ่ายการตลาด
            @elseif ($row->users->department_id==5) ฝ่ายบริหาร
            @elseif ($row->users->department_id==6) ฝ่ายบัญชี
            @elseif ($row->users->department_id==7) ฝ่ายซ่อมบำรุง
            @endif 
            </td>
            <td> ชื่อผู้ดำเนินการ</td>
            @if ($row['repairman']=="")
            <td> </td>
            @else
            <td>{{$row->repairname->name}}</td>
            @endif
          </tr>
          <tr>
          <td>รูปภาพประกอบ</td>
          <td> @include('user/modalUser/img') </td>
          <td> หมายเหตุ</td>
            <td>{{$row['remark']}}</td>
          </tr>
          </table>
          <div align="right"> 
          <a href=javascript:history.back() class="btn btn-default">Close</a> 
          </div>
    </div>

   @endif
    </body>
</html>
