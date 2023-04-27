<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style1.css">
</head>
<body>
    
    <nav id="navbar" class="navbar navbar-dark bg-primary">
        <img src="/asset/logo.svg" alt="">
        <span class="navlinks">
            <li><a href="index">Home</a></li>
            <li><a href="loginUser">Login</a></li>
            <li><a href="createUser">Register</a></li>
        </span>
    </nav>

    <section id="section1">
<div class="container col-md-6" style="padding-top: 20px" id="hero">
<br><br><br><br>
        <div class="card shadow">
            <div class="card-header text-center"> </div>
                <div class="card-body">
                        <div style="text-align:center">
                            <h2>Item List</h2>
                        </div>
                        <br>
                    <div class="col-md-6" style="">
                    <form action="" method="get" class="input-group row">
                        <div class="input-group" style="">
                            <input type="search" class="form-control" name="search" placeholder="Search by Name" value=""/>
                            <button type="submit" class="btn btn-primary">Search</button>
                         </div>
                    </form>
                        <br>
                        <form action="/createItem" method="get" class="input-group row">
                            <button type="submit" class="btn btn-success">Add New</button>
                        </form>
                    <br>
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($barangs as $bara)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bara->category }}</td>
                                <td>{{ $bara->name }}</td>
                                <td>{{ $bara->price }}</td>
                                <td>{{ $bara->quantity }}</td>
                                <td><img src="{{asset('images/'.$bara->image) }}" alt="image not found"></td>
                                <td>
                                    <a href="/edits/{{$bara->id}}">
                                        <button type="submit" class="btn btn-success col-md">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="/delete/{{$bara->id}}"><button type="submit" class="btn btn-danger col-md">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>