<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <h3 style="text-align:center;">Car  {{ $car->id }}</h3>
          
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-3">
                  <img src="/images/{{$car->image }}" />
              </div>
              <div class="col-md-3">
                  <p>description: {{ $car->description }}</p>  
                  <p>Model: {{ $car->model}}</p>
                  <p>Produced on: {{ $car->produced_on }}</p>
              </div>
              <div class="col-md-3"></div>
          </div>
        </div>
    </div>
      
</div>
</body>
</html>