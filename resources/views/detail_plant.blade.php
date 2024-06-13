@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detail Plant Information</h1>
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

#italic {
  font-style: italic;
}
</style>
@stop

@section('content')

@if(session()->has('success'))
    <p>
        {{ session()->get('success') }}
    </p>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

    <p></p>
<form action="{{ url($detail_plant_data->id) }}" method="POST">
        @csrf
        @method('PUT')
    <table id="customers">
        <tr>
            <td>Plant Name</td>
            <td id="italic">{{$detail_plant_data->name}}</td>
        </tr>
        <tr>
            <td>Observations</td>
            <td>{{$detail_plant_data->number}}</td>
        </tr>
        <tr>
            <td>Tag</td>
            <td>{{$detail_plant_data->tag}}</td>
        </tr>
        <tr>
            <td>Location</td>
            <td>{{$detail_plant_data->location}}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td>{{$detail_plant_data->date}}</td>
        </tr>
        <tr>
            <td>Notes</td>
            <td>{{$detail_plant_data->notes}}</td>
        </tr>
        <tr>
            <td>Altitude</td>
            <td>{{$detail_plant_data->altitude}}</td>
        </tr>
        <tr>
            <td>Latitude</td>
            <td>{{$detail_plant_data->latitude}}</td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td>{{$detail_plant_data->longitude}}</td>
        </tr>
        <tr>
            <td>Images</td>
            <td>
            <img src="{{ asset($detail_plant_data->images) }}" style="width: 140px; height:140px;" alt="No image" />


            </td>
        </tr>
       
        
        
    </table>
</form>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop