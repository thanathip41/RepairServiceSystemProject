
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
    </head>
    <body  background="{{('/image/x.jpg')}}">
    @if (Auth::user()->deleted==0)
    <br>
        <div class="container">
        <div class="text-center"><h2>หมายเลขการแจ้งซ่อม {{$row['id']}}</h3></div>
        <div class="container">
        <ul class="progressbar">
        @if ($row->statusCheck==1)
              <li class="active">อยู่ระหว่างการรอคิว</li>
              <li >อยู่ระหว่างการดำเนินการ</li> 
              <li >รอการยืนยันจากผู้แจ้ง</li>
              <li >ดำเนินการเสร็จสิ้น</li>
            @elseif ($row->statusCheck==2)
              <li >อยู่ระหว่างการรอคิว</li>
              <li class="active">อยู่ระหว่างการดำเนินการ</li> 
              <li >รอการยืนยันจากผู้แจ้ง</li>
              <li >ดำเนินการเสร็จสิ้น</li>
            @elseif ($row->statusCheck==3)
              <li >อยู่ระหว่างการรอคิว</li>
              <li >อยู่ระหว่างการดำเนินการ</li> 
              <li class="active">รอการยืนยันจากผู้แจ้ง</li>
              <li >ดำเนินการเสร็จสิ้น</li>
            @elseif ($row->statusCheck==4)
              <li >อยู่ระหว่างการรอคิว</li>    
              <li >อยู่ระหว่างการดำเนินการ</li> 
              <li >รอการยืนยันจากผู้แจ้ง</li>
              <li class="active">ดำเนินการเสร็จสิ้น</li>
            @elseif ($row->statusCheck==5)
              <li >อยู่ระหว่างการรอคิว</li>    
              <li >อยู่ระหว่างการดำเนินการ</li> 
              <li >รอการยืนยันจากผู้แจ้ง</li>
              <li class="active">ดำเนินการไม่สมบูรณ์</li>
            @elseif ($row->statusCheck==6)
              <li >อยู่ระหว่างการรอคิว</li>    
              <li >อยู่ระหว่างการดำเนินการ</li> 
              <li >รอการยืนยันจากผู้แจ้ง</li>
              <li class="active">เคลมอุปกรณ์</li>
            @elseif ($row->statusCheck==7)
              <li >อยู่ระหว่างการรอคิว</li>    
              <li >อยู่ระหว่างการดำเนินการ</li> 
              <li >รอการยืนยันจากผู้แจ้ง</li>
              <li class="active">ซื้ออุปกรณ์ใหม่</li>
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
            <td>{{date('d/m/Y',strtotime($row['created_at']))}}</td>
            <td> เวลาดำเนินการ</td>
            <td>@if ($row['created_at']==$row['updated_at'])  ไม่ได้ดำเนินการ
            @else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</td>
          </tr>
            <tr>
                <td>ประเภทอุปกรณ์ </td>
                <td>{{$row->typeCheck->type_name}}</td>
                <td> สถานะการซ่อม  </td>
            <td>{{$row->statusCheckname->status}}</td>
          </tr>
          <tr>
          <td > รหัสผลิตภัณท์ </td>
            <td>{{$row['productCode']}}</td>
        
            <td>วิธีแก้ไขปัญหา</td>
            <td>{{$row['method']}}</td>

          </tr>
          <tr>
            <td>สาเหตุ/ปัญหาที่พบ </td>
            <td>{{$row['problem']}}</td>
            <td> ชื่อผู้แก้ไขปัญหา</td>
            <td>{{$row['repairman']}}</td>
          </tr>
          <tr >
            <td> ชื่อ-นามสกุล   </td>
            <td> {{$row->users->name}}  </td>
            <td> หมายเหตุ</td>
            <td>{{$row['remark']}}</td>
          </tr>
          <tr>
          <td>แผนกงาน</td>
          <td>{{$row->users->department}}</td>
          <td></td>
          <td></td>
          </tr>
          </table>

    </div>

   @endif
    </body>
</html>