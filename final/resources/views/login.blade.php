@extends('template')
@section('content')
    <!-- <div class="row">
        <div class="col-md-4 offset-md-4 mt-5">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Login
                </div>
                <div class="card-body p-2">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <input name="Email" type="email" class="form-control @error('Email') is-invalid @enderror"
                            id="email" placeholder="Input Email" value="{{ old('Email') }}"> 
                            @error('Email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="Password" type="password" class="form-control @error('Password') is-invalid @enderror"
                            id="password" placeholder="Input Password" value="{{ old('Password') }}">
                            @error('Email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-check form-group">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember">
                                Remember Me
                            </label> 
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

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
                        <label for="Password" class="form-label @error('Password') is-invalid @enderror">Password</label>
                        <input name="Password" type="password" class="form-control" id="password" placeholder="Input Password" value="{{ old('Password') }}">
                        @error('Password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
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
                    <div class="form-check form-group">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember">
                            Remember Me
                        </label> 
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
@endsection



   