<input type="radio" name="demo" value="one"/> Search Name &nbsp;&nbsp;
<input type="radio" name="demo" value="Two"/> Search Code &nbsp;&nbsp;
<input type="radio" name="demo" value="Three"/> Search Date &nbsp;&nbsp;
<input type="radio" name="demo" value="Four"/> Search Date Between
<br>
<br>
<div id="showone" class="myDiv" align="center" style="margin-left:25% ; margin-right:25%">
<form action="{{action('MainDataRepairController@searchName')}}" method="post" >
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="searchName"	 placeholder="Search Name"  >
				 <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
			</div>
		</form>
</div>
<div id="showTwo" class="myDiv" align="center" style="margin-left:25% ; margin-right:25%">
<form action="{{action('MainDataRepairController@searchCode')}}" method="post" >
			{{ csrf_field() }}
			<div class="input-group">
			<input type="text"  class="form-control" name="searchCode"placeholder="Search Code"  > 
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>	
		</form>
</div>

<div id="showThree" class="myDiv" align="center" style="margin-left:33% ; margin-right:33%">
	<form action="{{action('MainDataRepairController@searchDate')}}" method="post" >
			{{ csrf_field() }}
			<div class="input-group">
			<input name="searchDate" type="date" class="form-control">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
			</div>
		</form>
</div>

<div id="showFour" class="myDiv" align="center" style="margin-left:20% ; margin-right:22%">
		<form id="MyForm" action="{{action('MainDataRepairController@searchDateBetween')}}" method="post" > {{ csrf_field() }}
		<div class="input-group">
		
			<input name="searchDatefrom" type="date" class="form-control">
			&nbsp; Date to  &nbsp;
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
