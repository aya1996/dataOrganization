@extends('layouts.default')

@section('content')

<div class="row pt-3">
    <div class="col-md-12">
        <h1 class="h3">groub by Posts</h1>
    </div>

</div>

@foreach($posts as $type => $children)
@include('collections.groupby.' . $type)

@endforeach
@endsection
