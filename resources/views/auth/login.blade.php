@extends('layouts.master')

@section('title', 'Jurudapur')

@section('content')
    <main class="container d-flex align-items-center">
        <div class="row justify-content-center align-items-center" style="flex: 1;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                <div class="card w-100 p-4">
                    <h3>{{ __('Masuk') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus aria-describedby="email" placeholder="{{ __('Email') }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Password') }}">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleCheck1">{{ __('Ingat Saya') }}</label>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Masuk') }}</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Lupa Password Anda?') }}
                            </a>
                        @endif
                        <br>
                        {{ __('Belum mempunyai akun? klik') }} 
                        <a href="{{ route('register')}}">{{ __('di sini') }}</a>
                    </form>
                    atau
                    <a href="{{ url('login/google') }}" class="btn btn-danger">{{ __('Masuk dengan Google') }}</a>
                </div>
            </div>
        </div>
    </main>
@endsection
