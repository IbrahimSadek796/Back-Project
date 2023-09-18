@extends('parts.app')

@section('title',  ' Show User')


@section('content')

    <div class="page-content card">
        <div class="row g-3 card-body">
            <div class="card-title">
                <a class="float-end btn btn-primary mt-3" href="{{ url()->previous() }}">Back</a>
                <h1 class="mt-3">Show User</h1>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputName">Name</label>
                <input class="form-control" id="inputName" name="name" type="text" value="{{ $user->name }}"
                    disabled>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputEmail">Email</label>
                <input class="form-control" id="inputEmail" name="email" type="text" value="{{ $user->email }}"
                    disabled>
            </div>
        </div>
    </div>

@endsection
