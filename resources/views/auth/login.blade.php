<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-dark">
<section class=" text-center text-lg-start w-50 mx-auto my-5">

    <div class="card col-md-12 my-5 ">
      <div class="row g-0 d-flex align-items-center">
        <div class="col-lg-4 d-none d-lg-flex">
          <img src="{{url('img/product/navid-sohrabi-IYSeEOY0I1w-unsplash.jpg')}}" alt="Trendy Pants and Shoes"
            class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>
        <div class="col-lg-8">
          <div class="card-body py-5 px-md-5">
            <h2 class="fw-bold mb-5"><img src="{{url('img/logo.png')}}" alt="Trendy Pants and Shoes"
                class="w-50 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" /></h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label class="form-label" for="password">{{ __('Password') }}</label>
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" name="remember" type="checkbox" value="" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
                  </div>
                </div>

                <div class="col">
                  <!-- Simple link -->
                  @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                  @endif
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('Login') }}</button>

              <p>Don't have an account? <a href="{{route('register')}}" class="link-info">Register here</a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
