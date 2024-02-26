@extends('layout.app')
@section('style')
    <style>
        .post{
    width: 100%;
    aspect-ratio: 1 / 1; /* Use viewport height to make it fill the entire vertical space */
    overflow: hidden; /* Hide any overflow if the image is larger than the container */
    position:relative ;
    object-fit:cover ;
}
.image{
  filter: brightness(40%);
}
    </style>
@endsection
@section('content')
<div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12 ">
        <form action="" >
          <div class="input-group mb-3 mt-3 px-5 justify-content-center">
            <input type="text" class="form-control" placeholder="Search" name="comment" style="max-width:75%">
            <button class="btn btn-outline-dark text-light border border-light me-2" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
          </div>
        </form>
      </div>
      <div class="col-12 p-5">
        <h1 class="h1 text-white mb-3" >Albums</h1>
        <div class="row">
          @foreach ($album as $a)
          <div class="col-xxl-2 col-lg-4 col-xl-3 col-6 mb-3">
            <a href="{{ route('album',$a->id) }}">
                <div class="card text-bg-dark">
                    <img src="{{ asset('images/'.$a->post->image) }}" class="card-img image post" alt="...">
                    <div class="card-img-overlay">
                        <h3 class="card-title">{{ $a->judul }}</h3>
                        <h6>By {{ $a->user->username }}</h6>
                    </div>
                </div>
            </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection