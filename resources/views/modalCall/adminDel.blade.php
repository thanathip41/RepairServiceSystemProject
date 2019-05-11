<button class="btn btn-danger"  data-toggle="modal" data-target="#m{{ $row['id']}}"><i class="fa fa-trash-o"></i></button> 
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
          <form method="post" action="{{action('AdminController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body" >
					<p class="text-center">
					<input type="hidden"  name="deleted" value="1"> คุณต้องการลบ {{$row['id']}} ใช่หรือไม่ <br>
					</p>
	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button onclick="validation()" type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
function validation()
{ Swal.fire({
  type: 'success',
  title: 'Deleted successfully',
})
}
</script>