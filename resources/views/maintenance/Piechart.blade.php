@extends('layouts.navside') 
@section('content')
<div class="text-center"> 
<h2> รายงานผลปัญญาต่างๆที่มีการแจ้งซ่อมในบริษัท </h2>
<br>
<p> @foreach ($problemAll as $p) 
จำนวนปัญหาทั้งหมดในบริษัท {{$p->number}} ปัญหา
@endforeach
</p>
</div>
<script type="text/javascript">
   var analytics = <?php echo $problem; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
    
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
  
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:950px; height:550px; ">
     </div>
    </div>
    <div class="container">
    
    </div>
@stop

