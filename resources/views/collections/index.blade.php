@extends('layouts.default')

@section('content')

<div class="row pt-3">
    <div class="col-md-12">
        <h1 class="h3">Posts</h1>
    </div>

</div>

@foreach($posts as $post)
<div class="row pb-3">
    <div class="col 12">
        <div class="p2 border rounded ">
            <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
        </div>
    </div>
</div>
@endforeach
@endsection
