
<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#full{{$id}}"><i class="fa fa-file"></i>  </button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal fade" id="full{{$id}}"  role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">หมายเลขแจ้งซ่อม  {{$id}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form  action="{{action('MainDataRepairController@downloadPDF', $id)}}">
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
                <td>{{$problem}}</td>
              </tr>
							<tr class="table-light">
								<td > รหัสผลิตภัณท์ :</td>
                <td>{{$productCode}}</td>
              </tr>
							<tr class="table-light">
								<td>เวลาแจ้งซ่อม</td>
                <td>{{date('d/m/Y',strtotime($created_at))}}</td>
              </tr>
							<tr class="table-light">
								<td> ชื่อ-นามสกุล :</td>
                <td> {{$name}} </td>
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
								<td > สถานะการซ่อม : </td>
                <td>{{$status}}</td>
              </tr>
							<tr class="table-light">
								<td> เวลาดำเนินการ:</td>
                <td>@if ($created_at==$updated_at)  
							@else {{date('d/m/Y',strtotime($updated_at))}} @endif</td>
              </tr>
							<tr class="table-light">
								<td>วิธีแก้ไขปัญหา : </td>
                <td>{{$method}}</td>
              </tr>
							<tr class="table-light">
								<td> ชื่อผู้แก้ไขปัญหา : </td>
                <td>{{$repairman}}</td>
              </tr>
							<tr class="table-light">
								<td> หมายเหตุ : </td>
                <td>{{$remark}}</td>
              </tr>
            </tbody>
          </table>			
	     	  </div>
           <div class="modal-footer">
					 <p class="text-center">
              <button type="submit" class="btn btn-success"> print </button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </p>
	      </div>
      </form>
    </div>
  </div>
</div>