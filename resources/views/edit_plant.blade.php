@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Update Plant Information</h1>
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
<form action="{{ url('update_data/'.$edit_plant_data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <table>
        <tr>
            <td>Plant Name</td>
            <td><input type="text" name="name" value="{{$edit_plant_data->name}}"></td>
        </tr>
        <tr>
            <td>Observations</td>
            <td><input type="text" name="number" value="{{$edit_plant_data->number}}"></td>
        </tr>
        <tr>
            <td>Tag</td>
            <td><input type="text" name="tag" value="{{$edit_plant_data->tag}}"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="text" name="date" value="{{$edit_plant_data->date}}"></td>
        </tr>
        <tr>
            <td>Notes</td>
            <td><input type="text" name="notes" value="{{$edit_plant_data->notes}}"></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><input type="text" name="location" value="{{$edit_plant_data->location}}"></td>
        </tr>
        <tr>
            <td>Altitude</td>
            <td><input type="text" name="altitude" value="{{$edit_plant_data->altitude}}"></td>
        </tr>
        <tr>
            <td>Latitude</td>
            <td><input type="text" name="latitude" value="{{$edit_plant_data->latitude}}"></td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td><input type="text" name="longitude" value="{{$edit_plant_data->longitude}}"></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="images" value="{{$edit_plant_data->images}}" class="form-control">
            </td>
        </tr>
       
        <tr>
            <td></td>
            <td>
                <input type="submit" />
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