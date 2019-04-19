<button class="btn btn-success"  data-toggle="modal" data-target="#fxx{{$row['id']}}"><i class="fa fa-file"></i>  </button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="fxx{{$id}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<label> <h2>หมายเลขแจ้งซ่อม  {{$id}}</h2></label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form  action="{{action('MainDataRepairController@downloadPDF', $row['id'])}}">
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
								<td>สาเหตุ/ปัญหาที่พบ :</td>
                <td>{{$row['problem']}}</td>
              </tr>
							<tr class="table-light">
								<td > รหัสผลิตภัณท์ :</td>
                <td>{{$row['productCode']}}</td>
              </tr>
							<tr class="table-light">
								<td>เวลาแจ้งซ่อม</td>
                <td>{{date('d/m/Y',strtotime($row['created_at']))}}</td>
              </tr>
							<tr class="table-light">
								<td> ชื่อ-นามสกุล :</td>
                <td> {{$row['name']}} </td>

              </tr>
            </tbody> <br>
						<thead class="table-primary">
              <tr>
                <th>ข้อมูลการซ่อม</th>
								<th></th>
              </tr>
            </thead>

            <tbody>
              <tr class="table-light">
								<td > สถานะการซ่อม : </td>
                <td>{{$row->statusCheckname->status}}</td>
              </tr>
							<tr class="table-light">
								<td> เวลาดำเนินการ:</td>
                <td>@if ($row['created_at']==$row['updated_at'])  
							@else {{date('d/m/Y',strtotime($row['updated_at']))}} @endif</td>
              </tr>
							<tr class="table-light">
								<td>วิธีแก้ไขปัญหา : </td>
                <td>{{$row['method']}}</td>
              </tr>
							<tr class="table-light">
								<td> ชื่อผู้แก้ไขปัญหา : </td>
                <td>{{$row['repairman']}}</td>
              </tr>
							<tr class="table-light">
								<td> หมายเหตุ : </td>
                <td>{{$row['remark']}}</td>
              </tr>
            </tbody>
          </table>			
	     	  </div>
					 <p class="text-center">
					<button type="submit" class="btn btn-success"> print </button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>