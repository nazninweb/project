@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Number of Observation</h1>
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
    <p></p>
<table id="customers">
    <tr>
        <th> Month</th>
        <th> Observation</th>
        <th> Section</th>
        
    </tr>
    @foreach ($observations as $obsNo)
    <tr>
        <td> {{$obsNo['date']}}</td>
        <td> {{$obsNo['number']}}</td>
        <td>
            <a href="{{ url('edit_observation_number/'.$obsNo->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ url('delete_observation_number/'.$obsNo->id) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
{{$observations->onEachSide(1)->links()}}

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script src="//cdn.datatables.net/2.0.6/js/dataTables.min.js">  </script>

@stop