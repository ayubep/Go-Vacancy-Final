@extends('layouts.master')

@section('Admin Go-Vacancy', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Packet</title>
 
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
 
</head>

<body>
    <div class="page-header">
        <div class="container">
            <h1>Admin Packet<small></small></h1>
        </div><br>
		<a href="/admin/packet/new"><button class="btn btn-success">Add New</button></a>
    </div>
	
 
    <div class="container">
        <table id="packets" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image Url</th>
                    <th>Edit</th>
					<th>Delete</th>
                </tr>	
            </thead>
			                    <tbody>
                    @foreach ($packets as $packet)
                        <tr>
                            <td>{{$packet->name}}</td>
                            <td>{{$packet->description}}</td>
                            <td style="text-align:right">${{$packet->price}}</td>
                            <td>{{$packet->imageurl}}</td>
                            <td><a href="{{route('editpacket',['id'=>$packet->id])}}"><button class="btn btn-success">Edit</button></a></td>
							<td><a href="/admin/packet/destroy/{{$packet->id}}"><button class="btn btn-danger">Delete</button></a> </td>
                        </tr>
                    @endforeach
                    </tbody>

        </table>
    </div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
 
    <script>
        $(function() {
            var table = $("#packets").DataTable();
        });
		
  </script>
  
  
</body>
</html>  

@endsection