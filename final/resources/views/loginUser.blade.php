<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
</head>
<body>
<section id="section1">
<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center"> </div>
            <div class="card-body">
                <form action="login2" method="Post" enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="mb-3">
                        <h2>Enter your data</h2>
                    </div>
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input name="Name" type="text" class="form-control @error('Name') is-invalid @enderror" id="name" placeholder="Input Name" value="{{ old('Name') }}" autofocus>
                        @error('Name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input name="Email" type="text" class="form-control @error('Email') is-invalid @enderror" id="email" placeholder="Input Email" value="{{ old('Email') }}">
                        @error('Email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input name="Password" type="password" class="form-control" id="password" placeholder="Input Password" value="{{ old('Password') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Phone" class="form-label @error('Phone') is-invalid @enderror">Phone Number</label>
                        <input name="Phone" type="text" class="form-control" id="phone" placeholder="Input Phone" value="{{ old('Phone') }}">
                        @error('Phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <a href="{{url('createItem')}}"></a><button type="submit" class="btn btn-success">Insert</button></a>
                    <br>
                    <br>
                </form>
                <a href="{{url('index')}}"><button type="submit" class="btn btn-secondary">Cancel</button></a>
                <br>
                <br>
            </div>
        </div>
    </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>