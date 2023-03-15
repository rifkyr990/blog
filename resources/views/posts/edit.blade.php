@extends('layouts.app')

@section('content')

<body>
    @if (Auth::check())
    <div class="container py-4">
        <div class="col-sm-12 mt-5 text-center">
            <h2 class="fw-bold text-green">Edit postingan</h2>
            <div class="custom-separator my-4 mx-auto bg-primary"></div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Gagal</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @else

        @endif
        <form action="{{ route('edit', $post->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group col-sm-6">
                    <div class="form-group">
                        <p><strong>Judul postingan :</strong></p>
                        <input type="text" name="judul" id="" class="form-control" placeholder="Judul"
                            value="{{$post->judul}}">
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <div class="form-group">
                        <p><strong>Deksripsi :</strong></p>
                        <input type="text" name="deskripsi" id="" class="form-control" placeholder="deskripsi"
                            value="{{$post->deskripsi}}">
                    </div>
                </div>

                <div class="form-group col-sm-6 mt-2">
                    <label for="category_id"><strong>Kategori postingan :</strong></label>
                    <select class="js-example-basic-multiple form-control" name="category_id[]" multiple="multiple">
                        @foreach ($category as $data)
                        <option value="{{$data->id}}">{{ $data->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-6 d-inline-block">
                    <p><strong>Thumbnail</strong></p>
                    <div class="col-sm-6"><img src="/image/{{$post->foto}}" alt="" class="img-fluid w-50"></div>
                    <div class="col-sm-6"><input type="file" name="foto" id="foto" class="form-control" accept="image/*"
                            multiple></div>
                </div>

                <div class="form-group col-lg-12">
                    <div class="form-group">
                        <p><strong>isi kontent</strong></p>
                        <textarea name="content" id="summernote" cols="30" rows="10"
                            class="form-control">{{$post->content}}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 my-sm-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('home')}}" class="btn btn-danger mx-2">Back</a>
                </div>

            </div>
        </form>
    </div>
    @else
    <div class="container mt-5">
        <div class="container">
            <div class="text-center d-flex justify-content-center w-100 flex-column vh-100">
                <div class="row main mx-auto py-5 px-4" style="width: 500px;">
                    <img src="{{ asset('assets/img/notfound.svg') }}" alt="notfound" width="100px">
                    <h2 class="fw-bold mt-3">Error not found</h2>
                </div>
            </div>
        </div>
    </div>
    @endif
</body>
@endsection
