@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Monthly Observation</h1>
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
<form action="{{ url('update_data/'.$edit_obsdata->id) }}" method="POST">
        @csrf
        @method('PUT')
    <table>
        <tr>
            <td>Month</td>
            <td><input type="date" name="date" value="{{$edit_obsdata->date}}"></td>
        </tr>
        <tr>
            <td>Observations</td>
            <td><input type="text" name="number" value="{{$edit_obsdata->number}}"></td>
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