@extends('layouts.default')

@section('content')

<div class="row pt-3">
    <div class="col-md-12">
        <h1 class="h3">contains Posts</h1>
    </div>

</div>

@foreach($images as $image)
<div class="row pb-3">
    <div class="col-12">
        <div class="p-2 border rounded ">
            <img class="mw-100" src="{{$image}}" alt="">

        </div>
    </div>
</div>
@endforeach
@endsection
