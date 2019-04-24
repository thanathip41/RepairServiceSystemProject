@if ($row['statusCheck']==3)
    <button class="btn btn-primary"  data-toggle="modal" data-target="#m{{ $row['id']}}"> ยืนยันการซ่อม</button> 
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
				<form method="post" action="{{action('UserRepairVerifyController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
				<p class="text-center">
				<label>สถานะการซ่อม : </label><br>
				<input type="radio"  name="statusCheck" value="4" required>ยืนยันการซ่อมจากผู้แจ้งซ่อม<br>
                <input type="radio"  name="statusCheck" value="5" required>ปฏิเสธการซ่อมจากผู้แจ้งซ่อม<br>
				</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-danger">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
@elseif ($row['statusCheck']==1)
<a class="text-dark"> <i class="fa fa-spinner" ></i>  wait</a>
@elseif ($row['statusCheck']==2)
<a class="text-dark"> <i class="fa fa-spinner" ></i>  wait</a>
@elseif ($row['statusCheck']==4)
<a class="text-success"> Success</a>
@elseif ($row['statusCheck']==5)
<a class="text-dark"> <i class="fa fa-spinner" ></i>  wait</a>
@endif