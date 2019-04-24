
<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#detaill{{$row['id']}}"><i class="fa fa-file"></i></button>
<div class="modal fade" id="detaill{{$row['id']}}"  role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
	      <div class="modal-body">
				<table class="table">
            <thead class="table-primary">
						<tr>
                <th>ข้อมูลการแจ้งซ่อม</th>
								<th></th>
              </tr>
            </thead>
            <tbody >
            <tr class="table-light">
								<td > รหัสผลิตภัณท์ </td>
                <td>{{$row['productCode']}}</td>
              </tr>
              <tr class="table-light">
								<td>เวลาแจ้งซ่อม</td>
                <td>{{date('d/m/Y',strtotime($row['created_at']))}}</td>
              </tr>
              <tr class="table-light">
								<td>สาเหตุ/ปัญหาที่พบ </td>
                <td>{{$row['problem']}}</td>
              </tr>
							<tr class="table-light">
								<td> ชื่อ-นามสกุล </td>
                <td> {{$row->users->name}} </td>
              </tr>
              <tr class="table-light">
								<td> แผนกงาน </td>
                <td> {{$row->users->department}} </td>
              </tr>
            </tbody> 
            <br>
						<thead class="table-primary">
              <tr>
                <th>ข้อมูลการซ่อม</th>
								<th></th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-light">
								<td > สถานะการซ่อม  </td>
                <td>{{$row->statusCheckname->status}}</td>
              </tr>
							<tr class="table-light">
								<td> เวลาดำเนินการ</td>
                <td>@if ($row['created_at']==$row['updated_at'])  ไม่ได้ดำเนินการ
							@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</td>
              </tr>
							<tr class="table-light">
								<td>วิธีแก้ไขปัญหา  </td>
                <td>{{$row['method']}}</td>
              </tr>
							<tr class="table-light">
								<td> ชื่อผู้แก้ไขปัญหา  </td>
                <td>{{$row['repairman']}}</td>
              </tr>
							<tr class="table-light">
								<td> หมายเหตุ  </td>
                <td>{{$row['remark']}}</td>
              </tr>
            </tbody>
          </table>			
	     	  </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
    </div>
  </div>
</div>