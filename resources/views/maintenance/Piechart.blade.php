@extends('layouts.nav') 
@section('content')

<script type="text/javascript">
   var analytics = <?php echo $problem; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'รายงานผลปัญญาทีต่างๆที่มีการแจ้งซ่อมในบริษัท'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
  <br/>
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:750px; height:450px;">
     </div>
    </div>
    <div class="container">
    
    </div>
@stop

