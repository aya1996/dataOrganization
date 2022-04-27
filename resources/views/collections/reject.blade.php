@extends('layouts.default')

@section('content')

<div class="row pt-3">
    <div class="col-md-12">
        <h1 class="h3">Rejected Posts</h1>
    </div>

</div>

@foreach($posts as $post)
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
