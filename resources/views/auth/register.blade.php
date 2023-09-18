
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



<style>.cascading-right {
    margin-right: -50px;
  }

  .form-check-input{
    margin-left: -13.25rem
  }
  @media (max-width: 991.98px) {
    .cascading-right {
      margin-right: 0;
    }
  }</style>
</head>
<body class="bg-dark">

<!-- Section: Design Block -->
<section class="text-center text-lg-start w-75 mx-auto">

  <!-- Jumbotron -->
  <div class="card col-md-12 my-5 ">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="img/login/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">
            <h2 class="fw-bold mb-5"><img src="{{url('img/logo.png')}}" alt="Trendy Pants and Shoes"
                class="w-50 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" /></h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <!-- inputs for  names -->


              <div class="form-outline mb-4">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label class="form-label" for="name">{{ __('Name') }}</label>
              </div>



              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label class="form-label" for="email">{{ __('Email Address') }}</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label class="form-label" for="password">{{ __('Password') }}</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" />

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
                {{ __('Register') }}
              </button>


        </div>
      </div>


      {{-- <div class="col-lg-4 d-none mb-lg-0 d-lg-flex">
        <img src="img/login/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-4 shadow-4" />
      </div> --}}
    </div>
  </div>
  <!-- Jumbotron -->
</section>
</body>
</html>
