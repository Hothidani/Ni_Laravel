<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('cars.update', $car['id']) }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            @method('put')
            <legend>Edit a car</legend>
            
            <div class="form-group">
                <lable for="">Model</lable>
                <input type="text" name="model" class="form-control" id="" placeholder="Input field"  value="{{isset($car->model)?$car->model:''}}">
            </div>
            <div class="form-group">Manufacturer
            <select class="form-control " name="mf_name">           
                @foreach($manufacture as $ma)
                    <option value='{{$ma->id}} ' {{$ma->id == $car->mf_id?'selected':''}}  >{{$ma->mf_name}}</option>
                @endforeach
                </select>
                
            </div>
            <div class="form-group">
                <lable for="">Image</lable>
                <input type="file" name="image" class="form-control" id="" placeholder="Input field" value="{{isset($car->image)?$car->image:''}}">
                <img src="/images/{{ $car->image}}"style="width: 200px; "/>   
            
            </div>
            <div class="form-group">
                <lable for="">Description</lable>
                <input type="text" name="description" class="form-control" id="" placeholder="Input field" value="{{isset($car->description)?$car->description:''}}">
                
            </div>
            <div class="form-group">
                <lable for="">Produce_on</lable>
                <input type="" name="produced_on" class="form-control" id="" placeholder="Input field" value="{{isset($car->produced_on)?$car->produced_on:''}}">
                
            </div>
            
            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>

</html>