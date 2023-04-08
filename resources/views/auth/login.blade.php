<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/main/app.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/logo/favicon.png" type="image/png">

</head>

<body>
    <div id="auth">

        <div class="row h-50">
            <div class="col-lg-5 col-12">
                <div id="auth-left" class="mb-2">
                    <div class="auth-logo text-center">
                        <a href="/">
                            <h1>SiRoti</h1>
                            <span>
                                Sistem Informasi Pengolahan Transaksi Penjualan Roti Karunia Mandiri
                            </span>
                        </a>
                    </div>
                    <h3 class="mb-3">Halaman Login</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-md shadow-md mt-2">{{ __('Login') }}</button>
                    </form>
                    <p>
                    </p>
                    <p class="mt-2 mb-2">
                        <a class="mt-2" href="{{ route('password.request') }}">Lupa Password?</a>
                    </p>
                    <a class="" href="{{ route('register') }}">Belum Punya Akun?</a>
                    <p>
                        <p>
                            <br>
                        </p>
                    </p>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>
</html>

