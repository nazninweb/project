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

#italic {
  font-style: italic;
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
        <th> Observation</th>
        <th> Section</th>
      </tr>
    <tbody class="alldata">
    @foreach ($observations as $obsNo)
      <tr>
        <td id="italic"> {{$obsNo['name']}}</td>
        <td> {{$obsNo['number']}}</td>
        <td>
            <a href="{{ url('edit_plant_data/'.$obsNo->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ url('delete_plant_data/'.$obsNo->id) }}" class="btn btn-danger">Delete</a>
            <a href="{{ url('detail_plant_data/'.$obsNo->id) }}" class="btn btn-primary">Details</a>
        </td>
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