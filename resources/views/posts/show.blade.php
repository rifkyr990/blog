@extends('layouts.app')

@section('content')

<body>
    <header class="masthead h-100"
        style="background-image: url('/assets/img/post-bg.jpg'); background-blend-mode: multiply;">

        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1 class="heading mb-3">{{$post->judul}}</h1>
                        <span class="meta">
                            <i>Posted by {{ $post->author }} on {{ $post->tanggal }}</i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </article>

    <div class="container bootdey">
        <div class="col-md-12 bootstrap snippets">
            <div class="panel">
                <div class="panel-body">
                    <form action="{{ route('comment', $post->id) }}" method="post">

                        @csrf
                        <textarea class="form-control" name="comment" id="comment" rows="2"
                            placeholder="What are you thinking?"></textarea>
                        <div class="mar-top clearfix">
                            <button class="btn btn-sm btn-primary pull-right" type="submit"><i
                                    class="fa fa-pencil fa-fw"></i> Share</button>
                            <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                            <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                            <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <!-- Newsfeed Content -->
                    <!--===================================================-->
                    <div class="media-block">
                        <div class="media-body">
                        @foreach ($comment as $item)
                        <a class="media-left" href="#"><img class="img-circle img-sm me-2" alt="Profile Picture"
                                src="https://i.ibb.co/BtYHCvb/pngwing-com.png"></a>
                            <div class="mar-btm">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">{{$item->user->name}}</a>
                                <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 
                                    @php
                                        $interval = Carbon\Carbon::parse($item->create_at)->diffInHours(Carbon\Carbon::now());
                                        $day = $interval / 24;
                                    @endphp
                                    @if ($interval < 1)
                                        <p>A hours ago</p>
                                    @elseif ($day < 1)
                                        <p>{{$interval}} A days ago</p>
                                    @else
                                        {{ $day }} days ago
                                    @endif
                                </p>
                            </div>
                            <p>{{ $item->comment }}</p>
                            <div class="pad-ver">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-default btn-hover-success" href="#"><i
                                            class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i
                                            class="fa fa-thumbs-down"></i></a>
                                </div>
                                <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Newsfeed Content -->
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
