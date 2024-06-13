@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Plant Observation</h1>
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
    <form action="{{ route('add_individual_observations.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Plant Name</td>
            <td><input type="text" name="name" value=""></td>
        </tr>
        <tr>
            <td>Observations</td>
            <td><input type="text" name="number" value=""></td>
        </tr>
        <tr>
            <td>Tag</td>
            <td><input type="text" name="tag" value=""></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="text" name="date" value=""></td>
        </tr>
        <tr>
            <td>Notes</td>
            <td><input type="text" name="notes" value=""></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><input type="text" name="location" value=""></td>
        </tr>
        <tr>
            <td>Altitude</td>
            <td><input type="text" name="altitude" value=""></td>
        </tr>
        <tr>
            <td>Latitude</td>
            <td><input type="text" name="latitude" value=""></td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td><input type="text" name="longitude" value=""></td>
        </tr>
        <tr>
            <td>Images</td>
            <td><input type="file" name="images" value="" class-"form-control"></td>
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