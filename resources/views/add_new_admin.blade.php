@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add New Admin</h1>
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
    <form action="{{ route('add_new_admin.store') }}" method="post">
    @csrf
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value=""></td>
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

