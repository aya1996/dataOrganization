@extends('layouts.default')

@section('content')

<div class="row pt-3">
    <div class="col-md-12">
        <h1 class="h3">parition Posts</h1>
    </div>

</div>
<h2>PopularPosts Posts</h2>
@foreach($PopularPosts as $post)
<div class="row pb-3">
    <div class="col-12">
        <div class="p-2 border rounded font-weight-bold">
            <p class="d-block mr-3 w-50">{{ $post['data']['ups'] }}</p>
            <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
        </div>
    </div>
</div>
@endforeach

<h2>RegularPosts Posts</h2>
@foreach($RegularPosts as $post)
<div class="row pb-3">
    <div class="col-12">
        <div class="p-2 border rounded ">
            <p class="d-block mr-3 w-50">{{ $post['data']['ups'] }}</p>
            <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
        </div>
    </div>
</div>
@endforeach
@endsection
