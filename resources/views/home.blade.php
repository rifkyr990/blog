@extends('layouts.app')

@section('content')
<header class="masthead h-100" style="background-image: url('assets/img/home-bg.jpg');background-blend-mode: multiply;">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1 class="heading">Clean Blog</h1>
                    <span class="subheading post-subtitle">A blog collection of useful articles</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">

        <div class="col-md-10 col-lg-8 col-xl-7" id="#post">

            <!-- Post preview-->
            @foreach ($posts as $data)
            @if ($data->status_id == '3')
            <div class="post-preview">

                <a href="{{ route('show', $data->slug) }}" class="text-decoration-none">
                    <h2 class="post-title fw-5"><b>{{ $data->judul }}</b></h2>
                    <h3 class="post-subtitle fw-lighter card-text">{{ $data->deskripsi }}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href=""> {{ $data->author }}</a>
                    on {{ $data->tanggal }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endif
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>
</div>
@endsection
