@extends('layout.app')
@section('title')
    Home | WeebsGallery
@endsection
@section('style')
    <style>
        @media (min-width: 769px) {
    .masonry-container {
-webkit-column-count: 6;
-moz-column-count: 6;
column-count: 6;

-webkit-column-gap: 15px;
-moz-column-gap: 15px;
column-gap: 15px;
}     
}

@media (max-width: 768px) {
.masonry-container {
-webkit-column-count: 4;
-moz-column-count: 4;
column-count: 4;

-webkit-column-gap: 15px;
-moz-column-gap: 15px;
column-gap: 15px;
}     
}

.masonry-item {
display: inline-block;
width: 100%;
}
.masonry-item img {
display:block;
width: 100%;
}

.masonry-item:hover {
filter:opacity(50%);
}

    </style>
@endsection
@section('content')
<div class="col-1 mb-5 position-fixed end-0 bottom-0">
    <a name="" id="" class="btn btn-dark btn-lg " href="{{route('post-add')}}" role="button"><i class="fas fa-plus"></i></a>
</div>
<div class="masonry-container mt-5 m-4">
    @foreach ($post as $p)
    <a href="{{ route('show',$p->id) }}">
        <div class="masonry-item mb-2 col-md-2 post" >
            <img src="{{ asset('images/'.$p->image) }}" alt="Post Image" class=" post rounded-4">
        </div>
    </a>
    @endforeach
</div>
@endsection