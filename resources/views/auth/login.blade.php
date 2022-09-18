@extends('layouts.app')
@section('content')

<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-4">
        <div class="card mt-5">
            <div class="card-header">
                <h5>Login</h5>
            </div>
            <div>
                <em class="text-danger">{{session('loginFailed')}}</em>
            </div>
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                        @error('email')
                        <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                        @error('password')
                        <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6"></div>

</div>

@endsection