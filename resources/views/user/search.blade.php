@extends('user.master') 
@section('title','Serach')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br> 
<h3 align="center">Serach Data</h3> <br /> 
<div align="right"> <a href="{{route('user.create')}}" class="btn btn-primary">Add</a> <br> <br> 
</div> 
 
<input type="text" name="search" id="search" placeholder="search" class="form-control">
<br>
<h3 align="center">Total Data : <span id="total_records"></span></h3>

<table class="table table-bordered table-striped"> 
<thead>
<tr>
<th>ID</th> 
<th>productCode</th> 
<th>problem</th>
<th>name</th>
</tr> 
</thead>
<tbody>
</tbody>
</table> 
</div> 
</div>
</div> 
<script type="text/javascript">
    $(document).ready(function(){
        fetch_data();
    });
    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_data(query);
        });
    function fetch_data(query = '')
 {
    $.ajax({
     url:"{{ route('user.action') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
     }
  })
 }
</script>
@stop


