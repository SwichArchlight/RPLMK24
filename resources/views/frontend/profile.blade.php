@extends('layout.app')
@section('title')
    {{ $profile->username }}
@endsection
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

.header-image {
    position: relative;
    height: 300px; /* Adjust the height as needed */
    overflow: hidden;
}

.background-image {
    width: 100%;
    height: 100%;
    background-color: #474F7A; 
    background-image: url('{{ asset('header/'.$profile->profile->header) }}');
    background-size: cover;
    background-position: center;
    filter: brightness(0.5); /* Adjust brightness as needed */
}

.profile-container {
    position: absolute;
    bottom: 0;
    left: 10%;
    transform: translateX(-50%);
    background-color: #fff;
    border-radius: 50%;
    padding: 3px;
}

.profile-image {
    width: 100px; /* Adjust the width as needed */
    height: 100px; /* Adjust the height as needed */
    border-radius: 50%;
    object-fit: cover;
    display: block;
    margin: 0 auto;
}


.post{
    aspect-ratio: 1 / 1; /* Use viewport height to make it fill the entire vertical space */
    width: 100%;
    height: 100%; /* Use viewport height to make it fill the entire vertical space */
    overflow: hidden; /* Hide any overflow if the image is larger than the container */
    position: relative;
    object-fit: cover;
}
    </style>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-12">
       <header class="header-image">
           <div class="background-image"></div>
           <div class="profile-container my-3">
               <img class="profile-image" src="{{ asset('profile/'.$profile->profile->profile) }}" alt="Profile Image">
           </div>
       </header>
       <div style="background-color : #1b1d2a" class="p-3">
           <div class="row">
               <div class="col-12 ps-4">
                   <h1 class=" mt-2 text-light ">{{ $profile->username }}</h1>
                   <p class="text-light ">{{ $profile->profile->description }}</p>
                   @if ($profile->id == Auth::id())
                       
                   <a
                   name=""
                   id=""
                   class="btn btn-secondary"
                   href="{{ route('edit-profile', $profile->profile->id) }}"
                   role="button"
                   >Edit Profile</a
                   >
                   @endif
               </div>
               <div class="col-4 text-light px-4 mt-4">
                   <h3>{{ $post->count() }} Post</h3>
               </div>
           </div>
           <hr class="border border-light border-2 opacity-50">
           <div class="row">
            @foreach ($post as $p)
            <div class="col-4  col-lg-3 col-xxl-2 mb-2 " >
                    <a href="{{ route('show',$p->id) }}">
                    <img src="{{ asset('images/'.$p->image) }}" alt="Post Image" class="post">
                </a>
                </div>
                @endforeach
        </div>
       </div>  
@endsection