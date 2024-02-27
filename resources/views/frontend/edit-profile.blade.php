@extends('layout.app')
@section('title')
    Edit Profile | WeebsGallery
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-12">
      <h1 class="poppin text-light mt-5 mb-4 mx-5"> <b>Edit Profile</b></h1>
    <div class="card text-white bg-dark my-2 rounded-5" width="50%">
        <div class="card-body">
            <div class="row">
               <div class="col-12  p-5 align-items-center d-flex">
                <form action="{{ route('update-profile',$profile->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label for="judul"><h6>Header Image</h6></label>
                        <input type="file" class="form-control form-control-md mb-3" id="fileInput" accept="image/*" name="header"> 
                    </div>
                    <div class="col-12">
                        <label for="judul"><h6>Profile Image Image</h6></label>
                        <input type="file" class="form-control form-control-md mb-3" id="fileInput" accept="image/*" name="profile"> 
                    </div>
                  <div class="col-12">
                    <label for="judul"><h6>Deskripsi Profile</h6></label>
                    <input type="text" class="form-control mb-3" name="deskripsi" placeholder="Deskripsi" value="{{ $profile->description }}">      
                  </div>
                </div>
                <div class="col-12">
                    <button class="btn text-light" style="background-color: red" type="submit"> <b>Upadate Profile</b>  </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
    </div>
</div>
</div>
@endsection