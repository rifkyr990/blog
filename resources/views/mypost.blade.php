@extends('layouts.app')
@section('content')

<div class="container mt-5 py-4">
    @if (Auth::user())
    <h2 class="text-center fw-bold">Manage Post</h2>
    <div class="custom-separator my-3 mb-5 mx-auto bg-blue"></div>
    <a href="{{ url('create') }}" class="btn btn-primary mb-5">Add post</a>
    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">My post</a></li>
    <table class="table table-bordered table-striped table-responsive-lg">
        <thead class="bg-primary text-light">
            <tr class="text-center">
                <td scope="col">No</td>
                <td scope="col">Judul</td>
                <td scope="col" width="100">Author</td>
                <td scope="col">Tanggal</td>
                <td scope="col" width="150">Kategori</td>
                <td scope="col" width="150">Status</td>
                <td scope="col" width="200">Konten</td>
                <td scope="col" width="250">Gambar</td>
                <td scope="col" width="300">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $data)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{$data->judul}}</td>
                <td>{{$data->author}}</td>
                <td>{{$data->tanggal}}</td>
                <td>
                    @foreach ($data->category as $category)
                        <span class="badge badge-primary my-2">{{ $category->nama_kategori }}</span>
                    @endforeach
                </td>
                <td>
                    @if ($data->status_id == '1')
                    <span class="badge badge-warning my-2">{{ $category->nama_kategori }}</span>
                    @elseif ($data->status_id == '2')
                    <span class="badge badge-primary my-2">{{ $category->nama_kategori }}</span>
                    @elseif ($data->status_id == '3')
                    <span class="badge badge-success my-2">{{ $category->nama_kategori }}</span>
                    @endif
                </td>
                <td class="card-text">{!! $data->content !!}</td>
                <td><img src="image/{{ $data->foto }}" class="img-fluid rounded-start w-50"></td>
                <td>
                    <form action="{{ route('destroy', $data->id) }}" method="post">
                        <a href="{{ route('show', $data->slug) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('edit', $data->id) }}" class="btn btn-primary"><i
                                class="bi bi-pencil-square"></i></a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="container position-fixed">
        <div class="text-center d-flex justify-content-center w-100 flex-column vh-100">
            <div class="row main mx-auto py-5 px-4" style="width: 500px;">
                <img src="{{ asset('asset/img/not-found.svg') }}" class="img-fluid animated" alt="gambar">
                <h2 class="fw-bold mt-3">Error not found</h2>
                <p class="text-muted">Silahkan kembali ke halaman utama</p>
                <button class="btn btn-primary d-block mx-auto" style="width: 200px;"><a href="{{ url('/home') }}"
                        class="text-light text-decoration-none">Back to Home</a></button>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection
