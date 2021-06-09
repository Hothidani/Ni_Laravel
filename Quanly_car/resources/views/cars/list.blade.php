<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
		@if(Session::has('success'))
		<div class="alert alert-success">
			{{ Session::get('success') }}
		</div>
		@endif
	
	<h2>Danh sách xe</h2>
	<button type="button" class="btn btn-info" onclick="window.location='{{ route('cars.create') }}'">Thêm mới</button>
    <!-- <button type="button" class="btn btn-warning" href="{{ route('cars.create') }}">Thêm mới</button> -->
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Stt</th>
				<th>Model</th>
				<th>Manufacturers</th>
				<th>Image</th>
				<th>Description</th>
				<th>Produced_on</th>				
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
                $stt=0;
            @endphp
			@foreach($cars as $car)

			<tr>
                <td>{{ ++$stt }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->manufacturer->mf_name }}</td>
                <td><img src="/images/{{ $car->image}}" style="width: 50px; height:50px;" onclick="window.location='/cars/{{ $car->id }}'" />   </td>
                <td>{{ $car->description }}</td>
                <td>{{ $car->produced_on }}</td>
				
				
				<td>
				
                    <form action="{{ route('cars.destroy', $car['id']) }}" method="post">
					<button type="button" class="btn btn-success"onclick="window.location='/cars/{{ $car->id }}/edit'">Edit</button>
                            @csrf
                            @method('delete') 
                            <button name="delete" class="btn btn-danger" type="submit">Xóa</button>
                    </form>
                </td>

			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>