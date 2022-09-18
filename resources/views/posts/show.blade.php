@extends('layouts.app')
@section('content')

<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
    <div class="card mt-5">
        <div class="card-body">
            <x-post :post="$post"/>
        </div>
    </div>
    </div>

    <div class="col-md-2"></div>

</div>

@endsection