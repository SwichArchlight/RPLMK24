@extends('layout.auth')
@section('title')
    Login | WeebsGallery
@endsection
@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="row border-flush p-3 text-white d-flex justify-content-center align-items-center" >
    <div class="col-md-6 p-5  bg-dark rounded-5">
       <form action="{{ route('attempt') }}" method="post">
    @csrf
    <div class="row align-items-center">
        <div class="header-text text-center">
             <h1 class="title">WeebsGallery</h1>
             <p>- From Weebs, For Weebs -</p>
        </div>
        <div class=" mb-3">
          <label for="email">Email</label>
            <input type="text" class="form-control  bg-light" placeholder="Email address" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="pass">Password</label>
            <input type="password" class="form-control bg-light   " placeholder="Password" id="pass" name="password">
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-lg btn-primary w-100 fs-6" type="submit"><b>Login</b></button>
        </div>
        <div class="row">
            <small>Don't have account? <a href="{{ route('register') }}">Sign Up</a></small>
        </div>
  </div>
</form>
    </div> 

   </div>
 </div>
@endsection