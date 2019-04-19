<input type="radio" name="demo" value="One"/> Search ID  <br>
<input type="radio" name="demo" value="Two"/> Search Code <br>
<input type="radio" name="demo" value="Three"/> Search Date <br>
<input type="radio" name="demo" value="Four"/> Search Date Between Date  <br>


<div id="showOne" class="myDiv" >
<form action="{{action('MainDataRepairController@searchID')}}" method="post" >
			{{ csrf_field() }}
				  <input type="text"  name="searchID"	placeholder="Search ID"> 
					<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
		</form>
</div>

<div id="showTwo" class="myDiv">
<form action="{{action('MainDataRepairController@searchCode')}}" method="post" >
			{{ csrf_field() }}
				  <input type="text"  name="searchCode"	placeholder="Search Code"  > 
					<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
		</form>
</div>

<div id="showThree" class="myDiv">
	<form action="{{action('MainDataRepairController@searchDate')}}" method="post" >
			{{ csrf_field() }}
					<input name="searchDate" type="date">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Srearch</button>
		</form>
</div>

<div id="showFour" class="myDiv">
		<form id="MyForm" action="{{action('MainDataRepairController@searchDateBetween')}}" method="post" > {{ csrf_field() }}
					<input name="searchDatefrom" type="date">
					date to 
					<input name="searchDateto" type="date">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Srearch</button>
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