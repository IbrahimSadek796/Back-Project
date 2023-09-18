@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-center ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a class="navbar-brand btn btn-primary mt-3 text-light d-block w-25 mx-auto"  href=" @if ( Auth::user()->is_admin) {{route('admin.')}} @elseif (Auth::user()->is_admin == 0){{route('user.')}} @endif">
                        NEXT_PAGE
                   </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
