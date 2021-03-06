@extends('layouts.master')

@section('title', 'Jurudapur')

@section('content')
    <main class="container d-flex align-items-center">
        <div class="row justify-content-center align-items-center" style="flex: 1;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                <div class="card w-100 p-4">
                    <h3>{{ __('Daftar') }} </h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus aria-describedby="name" placeholder="{{ __('Nama Anda') }}">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required aria-describedby="email" placeholder="{{ __('Alamat Surel') }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Kata Sandi') }}">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ __('Konfirmasi Kata Sandi') }}">
                        </div>
                        <div class="my-3">
                            {{__('Dengan mendaftar di JuruDapur Anda menyetujui semua ') }}
                            <a href="{{ route('sdk') }}">{{ __('Syarat dan Ketentuan') }}</a> JuruDapur
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Daftar') }}</button>
                        <div class="text-center text-secondary m-3">atau</div>
                        <a href="{{ url('login/google') }}" class="btn btn-danger btn-block">
                            <i class="fab fa-google mr-3"></i> {{ __('Daftar dengan Google') }}
                        </a>
                        <br>
                        <hr>
                        Sudah mempunyai akun? klik 
                        <a href="{{ route('login') }}">di sini</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
