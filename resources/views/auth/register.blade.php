@extends('layouts.app')
@section('content')

<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-4">
        <div class="card mt-5">
            <div class="card-header">
                <h5>Register</h5>
            </div>
            <form action="{{route('register')}}" method="post">
                @csrf
            <div class="card-body">
                <div class="mb-3">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    @error('email')
                        <em class="text-danger">{{$message}}</em>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                    @error('name')
                        <em class="text-danger">{{$message}}</em>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="username" value="{{old('username')}}" class="form-control" id="exampleFormControlInput1" placeholder="Username">
                    @error('username')
                        <em class="text-danger">{{$message}}</em>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                    @error('password')
                        <em class="text-danger">{{$message}}</em>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1" placeholder="Retype-Password">
                    @error('password')
                        <em class="text-danger">{{$message}}</em>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
            </form>
        </div>
    </div>

    <div class="col-md-6"></div>

</div>

@endsection