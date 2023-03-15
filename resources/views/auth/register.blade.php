@extends('layouts.app')

@section('content')

<body class="overflow-hidden">
    <div class="bg-register">
        <div class="container">
            <div class="form d-flex justify-content-center align-items-center vh-100">
                <div class="row">
                    <div class="col-sm-12 px-5 bg-light text-dark rounded-2">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3 py-1">
                            <img src="{{ asset('assets/img/regist.svg') }}" alt="logo" class="d-block mx-auto py-5" style="width: 200px;">
                                <!-- <h2 class="text-center fw-bold mb-4 text-green">{{__('Registrasi')}}</h2> -->
                                <div class="col-sm-12 input-group input-group-sm w-100">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Nama pengguna">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 input-group input-group-sm w-100">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Email Pengguna">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 input-group input-group-sm w-100">
                                    <input id="password" type="password"
                                        class="form-control password @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password">
                                        <span class="input-group-text togglePassword" id="">
                                            <i data-feather="eye" style="cursor: pointer"></i>
                                        </span>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-sm-12 input-group input-group-sm w-100">
                                    <input id="password-confirm" type="password" class="form-control password"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Password konfirmasi">
                                        <span class="input-group-text togglePassword" id="">
                                            <i data-feather="eye" style="cursor: pointer"></i>
                                        </span>
                                </div>
                                <p class="text-center pt-3">Sudah memiliki akun ?<a class="text-green text-decoration-none pt-1"
                                        href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a></p>
                            </div>
                            <div class="row mb-0">
                                <div class="col-sm-12 text-center pb-5">
                                    <button type="submit" class="css-button-rounded--green mt-1 w-75">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
