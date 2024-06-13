@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Individual Observation</h1>
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
.search{
    width:100%;
    text-align: center;
    padding-top: 15px;
    padding-bottom: 15px;
}
</style>
@stop

@section('content')
    <p></p>
    <div class="container">
      <div class ="search">
        <input type="search" name="search" id="search" placeholder="Search Something Here" class="form-control">
      </div>
    </div>
    <table id="customers">
      <tr>
        <th> Plant Name</th>
        <th> Tag</th>
        <th> Notes</th>
        <th> Date</th>
        <th> Altitude</th>
        <th> Images</th>
      </tr>
    <tbody class="alldata">
    @foreach ($observations as $obsNo)
      <tr>
        <td> {{$obsNo['taxon']}}</td>
        <td> {{$obsNo['tag']}}</td>
        <td> {{$obsNo['notes']}}</td>
        <td> {{$obsNo['date']}}</td>
        <td> {{$obsNo['altitude']}}</td>
        <td> </td>
      </tr>
    @endforeach
    </tbody>
    <tbody id="Content" class="searchdata"></tbody>
</table>
{{$observations->onEachSide(1)->links()}}
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript"> 
      $('#search').on('keyup',function()
        {
          $value=$(this).val();

          if($value)
          {
            $('.alldata').hide();
            $('.searchdata').show();

          }
          else
          {
            $('.alldata').show();
            $('.searchdata').hide();

          }

          $.ajax({

            type:'get',
            url:'{{URL::to('search')}}',
            data:{'search':$value},

            success:function(data)
            {
                console.log(data);
                $('#Content').html(data);
            }

          });
        })

    </script>
@stop