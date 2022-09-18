@extends('layouts.app')
@section('content')

<div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">
        <div class="card mt-5 mb-5">
            <div class="card-body">
                @auth
                <form action="{{route('posts')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"><span class="fa fa-edit"></span></label>
                        <textarea class="form-control" placeholder="Tweet something" name="body" id="exampleFormControlTextarea1" rows="3">{{old('body')}}</textarea>
                    </div>
                    @error('body')
                    <em class="text-danger">{{$message}}</em>
                    @enderror
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
                @endauth
            </div>
        </div>

        @if($posts->count())
            @foreach($posts as $post)
                <x-post :post="$post"/>
            @endforeach

            <div class="d-flex justify-content-center mt-3">
                {{$posts->links()}}
            </div>

        @else
            <p>No posts yet</p>
        @endif

    </div>

    <div class="col-md-3"></div>

</div>

@endsection