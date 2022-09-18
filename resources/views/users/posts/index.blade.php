@extends('layouts.app')
@section('content')

<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
    <div class="card mt-5">
        <div class="card-header mb-3">
            <h5>All posts by {{$user->username}}</h5>
            <p>Made {{$posts->count()}} {{Str::plural('post', $posts->count())}}  and Received {{$user->receivedLikes()->count()}} likes</p>
        </div>
        @if($posts->count())
            @foreach($posts as $post)
                <x-post :post="$post"/>
            @endforeach

            <div class="d-flex justify-content-center mt-3">
                {{$posts->links()}}
            </div>

        @else
            <p>{{$user->username}} have no posts yet</p>
        @endif

    </div>
    </div>

    <div class="col-md-2"></div>

</div>

@endsection