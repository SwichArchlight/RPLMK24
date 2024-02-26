@extends('layout.app')
@section('title')
    Add Post | WeebsGallery
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-12">
      <h1 class="poppin text-light mt-5 mb-4 mx-5"> <b>Buat post</b></h1>
    <div class="card text-white bg-dark my-2 rounded-5" width="50%">
        <div class="card-body">
            <div class="row">
               <div class="col-12 col-md-6 p-5 justify-content-center d-flex">
                <div id="preview"></div>
               </div>
               <div class="col-12 col-md-6 p-5 align-items-center d-flex">
                <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <input type="file" class="form-control form-control-md mb-3" id="fileInput" accept="image/*" name="image"> 
                    </div>
                  <div class="col-12">
                    <label for="judul"><h6>Judul Gambar</h6></label>
                    <input type="text" class="form-control mb-3" name="judul" placeholder="Judul Gambar" id="judul">      
                  </div>
                  <div class="col-12">
                    <label for="deskripsi"><h6>Deskripsi</h6></label>
                    <textarea type="text" class="form-control mb-3" name="deskripsi" placeholder="Deskripsi" id="deskripsi"></textarea>
                  </div>
                  <div class="col-12">
                    <label for="deskripsi"><h6>Deskripsi</h6></label>
                    <select class="form-control mb-3" name="album" placeholder="Deskripsi" id="album">
                      <option value="0" hidden>Pilih Album</option>
                      <option value="-1">Tambah Album baru</option>
                      @foreach ($album as $a)
                      <option value="{{ $a->id }}">{{ $a->judul }}</option>
                      @endforeach
                    </select>
                    <div id="input" style="display: none">
                        <input type="text" class="form-control mb-3" name="judul_album" placeholder="Judul Album">      
                        <textarea  class="form-control mb-3" name="deskripsi_album" placeholder="Deskripsi Album"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn text-light" style="background-color: red" type="submit"> <b>Terbitkan</b>  </button>
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
@section('script')
    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('preview');
        preview.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-height: 400px;" class="img-fluid" >`;
      };
      reader.readAsDataURL(file);
    } else {
      document.getElementById('preview').innerHTML = '';
    }
  });
    </script>

    <script>
        document.getElementById('album').addEventListener('change', function() {
            const album = this.value;
            const input = document.getElementById('input')
            if (album == '-1') {
                input.style.display = 'block'
            } else {
                input.style.display = 'none'
            }    
        })
    </script>
@endsection