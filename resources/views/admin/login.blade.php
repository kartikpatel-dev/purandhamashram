<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('images/favicon.png') }}" />

    <title>{{ __('Admin Login') }} ~ {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('front.home') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                @include('admin.layouts.messages')

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{ __('Email Address / Mobile Number') }}</label>
                        <input type="text" id="email" name="email"
                            class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            required autocomplete="email" placeholder="Email / Mobile Number">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label text-md-end">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password" required autocomplete="current-password"
                            class="form-control" placeholder="Password" @error('password') is-invalid @enderror>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-dark btn-block">{{ __('Login') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- @if (Route::has('password.request'))
                    <hr>
                    <a class="text-center w-100 d-inline-block" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
            </div>

        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
</body>

</html>
