<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Items</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style1.css">
</head>
<body>

<section id="section1">
<div class="container col-md-6" style="padding-top: 20px" id="hero1">
        <div class="card shadow" id="hero2">
            <div class="card-body" id="hero3">
                <form action="/edits" method="Post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <h2>Items ID: {{$data['id']}}</h2>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id" value = "{{$data['id']}}">
                    </div>
                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <input name="Category" type="text" class="form-control" id="category" placeholder="Input Category" value="{{ old('Category') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input name="Name" type="text" class="form-control" id="name" placeholder="Input Name" value="{{ old('Name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Price" class="form-label">Price</label>
                        <input name="Price" type="number" class="form-control" id="price" placeholder="Input Price" value="Rp.{{ old('Price') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Quantity" class="form-label">Quantity</label>
                        <input name="Quantity" type="number" class="form-control" id="quantity" placeholder="Input Quantity" value="{{ old('Quantity') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Image" class="form-label">Image</label>
                        <input name="Image" type="file" class="form-control" id="image" placeholder="Input Image">
                    </div>

                    <a href="{{url('get-items')}}"></a><button type="submit" class="btn btn-success">Update</button></a>
                    <br>
                    <br>
                </form>
                <a href="{{url('index')}}"><button type="submit" class="btn btn-secondary">Cancel</button></a>
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