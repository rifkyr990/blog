@extends('layouts.admin')
@section('content')

<body>
    <!-- Header -->
    <div class="container-fluid mt-7">
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page confirmation</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Page name</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $data)
                                @if ($data->status_id == '1')
                                <tr>
                                    <th scope="row">
                                        {{$data->judul}}
                                    </th>
                                    <td>
                                        {{$data->author}}
                                    </td>
                                    <td>
                                        {{$data->tanggal}}
                                    </td>
                                    <td>
                                        @foreach ($data->category as $category)
                                        <span class="badge badge-primary my-2">{{ $category->nama_kategori }}</span>
                                        @endforeach</td>
                                    </td>
                                    <td>
                                        @if ($data->status_id == '1')
                                        <span class="badge badge-warning">{{$data->status->nama_status}}</span>
                                        @elseif ($data->status_id == '2')
                                        <span class="badge badge-danger">{{$data->status->nama_status}}</span>
                                        @elseif ($data->status_id == '3')
                                        <span class="badge badge-success">{{$data->status->nama_status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('show', $data->slug) }}" class="btn btn-info"><i
                                                class="bi bi-eye"></i></a>
                                        <a href="{{ route('setStatus', $data->id) }}?status_id=3"
                                            class="btn btn-primary"><i class="bi bi-clipboard-check"></i></a>
                                        <a href="{{ route('setStatus', $data->id) }}?status_id=2"
                                            class="btn btn-danger"><i class="bi bi-clipboard-x"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Social traffic</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Referral</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        1,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        5,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">70%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar"
                                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 70%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Google
                                    </th>
                                    <td>
                                        4,807
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">80%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 80%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Instagram
                                    </th>
                                    <td>
                                        3,678
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">75%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar"
                                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 75%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        twitter
                                    </th>
                                    <td>
                                        2,645
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">30%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar"
                                                        aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 30%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Publish Page</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Page name</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $data)
                                @if ($data->status_id == '3')
                                <tr>
                                    <th scope="row">
                                        {{$data->judul}}
                                    </th>
                                    <td>
                                        {{$data->author}}
                                    </td>
                                    <td>
                                        {{$data->tanggal}}
                                    </td>
                                    <td>
                                        @foreach ($data->category as $category)
                                        <span class="badge badge-primary my-2">{{ $category->nama_kategori }}</span>
                                        @endforeach</td>
                                    </td>
                                    <td>
                                        @if ($data->status_id == '1')
                                        <span class="badge badge-warning">{{$data->status->nama_status}}</span>
                                        @elseif ($data->status_id == '2')
                                        <span class="badge badge-danger">{{$data->status->nama_status}}</span>
                                        @elseif ($data->status_id == '3')
                                        <span class="badge badge-success">{{$data->status->nama_status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('show', $data->slug) }}" class="btn btn-info"><i
                                                class="bi bi-eye"></i></a>
                                        <a href="{{ route('setStatus', $data->id) }}?status_id=3"
                                            class="btn btn-primary"><i class="bi bi-clipboard-check"></i></a>
                                        <a href="{{ route('setStatus', $data->id) }}?status_id=2"
                                            class="btn btn-danger"><i class="bi bi-clipboard-x"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 mb-5 mb-xl-0 mt-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Reject Page</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Page name</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $data)
                                @if ($data->status_id == '2')
                                <tr>
                                    <th scope="row">
                                        {{$data->judul}}
                                    </th>
                                    <td>
                                        {{$data->author}}
                                    </td>
                                    <td>
                                        {{$data->tanggal}}
                                    </td>
                                    <td>
                                        @foreach ($data->category as $category)
                                        <span class="badge badge-primary my-2">{{ $category->nama_kategori }}</span>
                                        @endforeach</td>
                                    </td>
                                    <td>
                                        @if ($data->status_id == '1')
                                        <span class="badge badge-warning">{{$data->status->nama_status}}</span>
                                        @elseif ($data->status_id == '2')
                                        <span class="badge badge-danger">{{$data->status->nama_status}}</span>
                                        @elseif ($data->status_id == '3')
                                        <span class="badge badge-success">{{$data->status->nama_status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('show', $data->slug) }}" class="btn btn-info"><i
                                                class="bi bi-eye"></i></a>
                                        <a href="{{ route('setStatus', $data->id) }}?status_id=3"
                                            class="btn btn-primary"><i class="bi bi-clipboard-check"></i></a>
                                        <a href="{{ route('setStatus', $data->id) }}?status_id=2"
                                            class="btn btn-danger"><i class="bi bi-clipboard-x"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                            target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                                class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>
@endsection
