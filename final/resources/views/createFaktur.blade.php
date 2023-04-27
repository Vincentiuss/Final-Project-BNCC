<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
</head>
<body>
<section id="section1">
<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center"> </div>
            <div class="card-body">
                <form action="create2" method="Post" enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="mb-3">
                        <h2>Enter data</h2>
                    </div>
                    <div class="mb-3">
                        <label for="Quantity" class="form-label">Quantity</label>
                        <input name="Quantity" type="number" class="form-control" id="quantity" placeholder="Input Quantity" value="{{ old('Quantity') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <input name="Address" type="text" class="form-control" id="address" placeholder="Input Address" value="{{ old('Address') }}">
                    </div>
                    <div class="mb-3">
                        <label for="PostalCode" class="form-label">Postal Code</label>
                        <input name="PostalCode" type="number" class="form-control" id="postalcode" placeholder="Input Postal Code" value="{{ old('PostalCode') }}">
                    </div>

                    <a href="{{url('get-items-users')}}"></a><button type="submit" class="btn btn-success">Submit</button></a>
                    <br>
                    <br>
                </form>
                <a href="{{url('get-items-users')}}"><button type="submit" class="btn btn-secondary">Cancel</button></a>
                <br>
                <br>
                <ul class="error">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>