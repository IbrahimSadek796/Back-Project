@extends('parts.app')

@section('title',  ' Edit User')

@section('content')

    <div class="page-content card">
        <form class="row g-3 card-body" action="{{ route('admin.users.update', $user->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-title">
                <a class="float-end btn btn-primary mt-3" href="{{ route('admin.users.index') }}">Back</a>
                <h1 class="mt-3">Edit User</h1>
            </div>

            <div class="col-12">
                <label class="form-label" for="inputName">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" type="text"
                    value="{{ old('name', $user->name) }}" placeholder="Name...">
                @error('name')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputEmail">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email"
                    type="text" value="{{ old('email', $user->email) }}" placeholder="Email...">
                @error('email')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputPassword">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password"
                    type="password" value="{{ old('password') }}" placeholder="Password...">
                @error('password')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputPassword_confirmation">Password Confirmation</label>
                <input class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="inputPassword_confirmation" name="password_confirmation" type="password"
                    value="{{ old('password_confirmation') }}" placeholder="Password confirmation...">
                @error('password_confirmation')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

@endsection
