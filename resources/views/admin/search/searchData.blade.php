<div class="btn-group btn-group-toggle" data-toggle="radio">
<label class="btn btn-success active">
<input type="radio" name="demo" value="one" autocomplete="off" /><i class="fa fa-search"></i> ชื่อ &nbsp;&nbsp;
</label>
<label class="btn btn-success ">
<input type="radio" name="demo" value="Two" autocomplete="off"/><i class="fa fa-search"></i> ผลิตภัณฑ์ &nbsp;&nbsp;
</label>
<label class="btn btn-info active">
<input type="radio" name="demo" value="Three" autocomplete="off"/><i class="fa fa-search"></i> วันที่ &nbsp;&nbsp;
</label>
<label class="btn btn-info ">
<input type="radio" name="demo" value="Four" autocomplete="off"/><i class="fa fa-search"></i> ระหว่างวันที่
</label>
</div>

<br>
<br>
<div id="showone" class="myDiv" align="center" style="margin-left:30% ; margin-right:30%">
<form action="{{action('AdminDataRepairController@searchName')}}" method="post" >
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="searchName"	 placeholder="ค้นหา ชื่อผู้แจ้งซ่อม"  >
				 <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
			</div>
		</form>
</div>
<div id="showTwo" class="myDiv" align="center" style="margin-left:30% ; margin-right:30%">
<form action="{{action('AdminDataRepairController@searchCode')}}" method="post" >
			{{ csrf_field() }}
			<div class="input-group">
			<input type="text"  class="form-control" name="searchCode" maxlength="10" placeholder="ค้นหา รหัสผลิตภัณฑ์"  > 
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>	
		</form>
</div>

<div id="showThree" class="myDiv" align="center" style="margin-left:30% ; margin-right:30%">
	<form action="{{action('AdminDataRepairController@searchDate')}}" method="post" >
			{{ csrf_field() }}
			<div class="input-group">
			<input name="searchDate" type="date" class="form-control">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
			</div>
		</form>
</div>

<div id="showFour" class="myDiv" align="center" style="margin-left:30% ; margin-right:30%">
		<form id="MyForm" action="{{action('AdminDataRepairController@searchDateBetween')}}" method="post" > {{ csrf_field() }}
		<div class="input-group">
		
			<input name="searchDatefrom" type="date" class="form-control">
			&nbsp; ถึง  &nbsp;
			<input name="searchDateto" type="date" class="form-control">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
		</div>
		</form>
</div>
<br>
<style>
.myDiv{
display:none;
} 

</style>

<script>
$(document).ready(function(){
$('input[type="radio"]').click(function(){
var demovalue = $(this).val(); 
$("div.myDiv").hide();
$("#show"+demovalue).show();
});
});
</script>  
