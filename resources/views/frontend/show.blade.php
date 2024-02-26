@extends('layout.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-12 mx-md-5">
    <div class="card text-white bg-dark my-5 rounded-5" width="50%">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 p-4">
                    <img src="{{ asset('images/'.$post->image)}}" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-md-6">
                    <div class="row mt-4">
                        <div class="col-2">
                            <img src="https://i.pinimg.com/564x/db/69/fd/db69fd90ee3759c4dd9e91c9391c6f08.jpg" alt="" width="50px" style="border-radius: 25px ">
                          </div>
                          <div class="col-6 mb-5">
                                <a href="{{ route('profile',$post->user->username) }}" class="text-light link-underline-dark h3">
                                  <b>{{ $post->user->username }}</b>
                                </a>
                          </div>
                          <div class="col-4">
                            @if ($post->user_id == Auth::id())
                            <div class="dropdown">
                              <button class="btn btn-clear btn-sm text-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              </button>
                              <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('edit',$post->id) }}">edit</a></li>
                                    <form method="POST" action="{{ route('delete',$post->id) }}">
                                      @csrf
                                      <li><button class="dropdown-item" type="submit">delete</button></li>
                                    </form>
                                  </ul>
                                </div>
                                @endif
                          </div>
                          <div class="col-12 mb-2">
                            <h2>{{$post->judul}}</h2>
                            <p> {{$post->description}}</p>                              
                          </div>
                          <div class="col-12">
                              <p>Liked By <b>{{ $like->count() }}</b> people</p>
                            <h3 class="poppin">Comment</h3>
                            <div class="card text-white bg-dark border border-dark comment" style="max-height:200px">
                            <div class="overflow-auto p-3 ">
                              <div class="row">
                                @foreach ($comment as $c)
                                <div class="col-2"><img src="https://i.pinimg.com/564x/db/69/fd/db69fd90ee3759c4dd9e91c9391c6f08.jpg" alt="" width="50px" style="border-radius: 50%"></div>
                                <div class="col-10">
                                  <figure class="text-start">
                                    <blockquote class="blockquote">
                              <b>{{ $c->user->username }}</b>
                                    </blockquote>
                                    <figcaption class="blockquote-footer text-light">
                                        {{ $c->comment }}
                                    </figcaption>
                                  </figure>
                                </div>
                                @endforeach
                              </div>
                              </div>
                            </div>
                            </div>
                            <form action="{{ route('comment',$post->id) }}" method="POST" >
                              @csrf
                              <div class="input-group mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Comment" name="comment">
                                <button class="btn btn-outline-dark text-light border border-light me-2" type="submit" id="button-addon2"><i class="far fa-paper-plane"></i></button>
                            </form>
                            <form action="{{ route('like',$post->id) }}" method="POST">
                              @csrf
                              @if ($liked == 1)
                              <button class="btn btn-dark" type="submit"><i class="fas fa-heart"></i></button>
                              @else
                              <button class="btn btn-dark" type="submit"><i class="far fa-heart"></i></button>    
                              @endif
                            </form>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection