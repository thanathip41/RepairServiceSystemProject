<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Mail"> <i class="fas fa-envelope"> Wirte Mail</i></button>
<div class="modal fade" id="Mail"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<h4 class="modal-title">Write E-mail</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
			<form method="post" action="{{action('MainMailController@post')}}">{{csrf_field()}}  
	      <div class="modal-body">
					<div class="form-group"> 
					<label>Email</label>
								<input type="text" name="email" class="form-control" required>
								</div>
					<div class="form-group"> 
					<label>Subject</label>
					<input type="text" name="subject" class="form-control" required>
					</div> 
					<div class="form-group"> 
					<label>Message</label>
					<textarea type="text" name="message" class="form-control" row="8" required></textarea> 
					</div>
 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form> 
    </div>
  </div>
</div>
</div>