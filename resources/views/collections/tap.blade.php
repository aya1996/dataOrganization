@extends('layouts.default')

@section('content')

<div class="row pt-3">
    <div class="col-md-12">
        <h1 class="h3">Tapped Posts</h1>
    </div>

</div>

@foreach($posts as $post)
<div class="row pb-3">
    <div class="col-12">
        <div class="p-2 border rounded ">
            <img class="d-block mr-3" src="{{ $post['data']['thumbnail'] }}" width="100" alt="">
            <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
        </div>
    </div>
</div>
@endforeach
@endsection
