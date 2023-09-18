@extends('parts.app')

@section('title', 'Edit Book')


@section('content')

    <div class="page-content card">
        <form class="row g-3 card-body" action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-title">
                <a class="float-end btn btn-primary mt-3" href="{{ url()->previous() }}">Back</a>
                <h1 class="mt-3">Edit Post</h1>
            </div>

            <div class="col-12">
                <label class="form-label" for="inputTitle">Title</label>
                <input class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title"
                    type="text" value="{{ old('title', $post->title) }}" placeholder="Title...">
                @error('title')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputDescription">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription"
                    name="description"placeholder="Description...">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputImage">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" id="inputImage" name="image"
                    type="file" placeholder="Image...">
                @error('image')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
                <img class="img-thumbnail m-1" src="{{ \Storage::url($post->image) }}" width="50%">
            </div>

            <div class="col-12">
                <label class="form-label" for="inputPrice">Price</label>
                <input class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price"
                    type="text" value="{{ old('price', $post->price) }}" placeholder="Price...">
                @error('price')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputNumber">NumberOfProduct</label>
                <input class="form-control @error('number') is-invalid @enderror" id="inputNumber" name="number"
                    type="text" value="{{ old('number', $post->number_of_product) }}" placeholder="Number...">
                @error('number')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputTaxes">Taxes</label>
                <input class="form-control @error('taxes') is-invalid @enderror" id="inputTaxes" name="taxes"
                    type="text" value="{{ old('taxes', $post->taxes) }}" placeholder="Taxes...">
                @error('taxes')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputQuality">quality</label>
                <input class="form-control @error('quality') is-invalid @enderror" id="inputQuality" name="quality"
                    type="text" value="{{ old('quality', $post->quality) }}" placeholder="Quality...">
                @error('quality')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputKind">kind</label>
                <input class="form-control @error('kind') is-invalid @enderror" id="inputKind" name="kind"
                    type="text" value="{{ old('kind', $post->kind) }}" placeholder="Kind...">
                @error('kind')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

@endsection
