@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <table id="customers">

    <tr>
        <td width="50%">
            <div style=" margin: auto;">
            <div id="piechart"></div>
            </div>
        </td>
        <td width="50%"> 
            <div style=" margin: auto;">
            <div id="donutchart" ></div>
            </div>
 
        </td>
        
    </tr>
    <tr>
        <td width="50%"> 
            <div style=" margin: auto;">
            <div id = "container" >
            </div>
 
        </td>
        <td width="50%">
            <div style=" margin: auto;">
            <div id="barchart_values" ></div>
            </div>
        </td>
    </tr>
    <tr>
        <td width="50%"> 
            <div style=" margin: auto;">
            <div id = "" >
      </div>
            </div>
 
        </td>
        <td width="50%">
            <div style=" margin: auto;">
            <div id="" ></div>
            </div>
        </td>
    </tr>
</table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
     <!-- Other head elements -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Monthly Observations',
                    data: @json($data['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1-3 times',     142],
          ['4-6 times',      35],
          ['7-9 times',  12],
          ['at least 10 times', 20]
          
        ]);

        var options = {
          title: 'Percentage of observations'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Ecogravel',302],
          ['Biodiversity meadows',127],
          ['Other locations in the park',  373]          
        ]);

        var options = {
          title: 'Observations by Location',
          pieHole: 0.35,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

   <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["only once", 40, "red"],
        ["medium frequently", 51, "green"],
        ["20 most frequently", 10, "orange"]
        
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Percentage of species determined ",
        
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
   </script>

   <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
      <script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Year', 'Observations'],
               ['Apr-21',  90],
               ['May-21',  0],
               ['Jun-21',  29],
               ['Jul-21',  93],
               ['Aug-21',  3],
               ['Sep-21',  20],
               ['May-22',  116],
               ['Jun-22',  44],
               ['Jul-22',  2],
               ['Aug-22',  0],
               ['Sep-22',  7],
               ['Oct-22',  0],
               ['Nov-22',  2],
               ['Apr-23',  2],
               ['May-23',  20],
               ['Jun-23',  10],
               ['Jul-23',  375],
               ['Aug-23',  3],
               ['Sep-23',  2],
               ['Oct-23',  184]
             
       
            ]);

            var options = {title: 'Monthly Observations'}; 
            var chart = new google.visualization.ColumnChart(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
    </script>

@stop
