


@extends('parts.app')

@section('title', ' Show post')


@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <a class="float-end btn btn-primary mt-3" href="{{ url()->previous() }}">Back</a>
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                    </header>

                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded w-50 h-50"
                            src="{{ \Storage::url($post->image) }}" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <h5>Price {{$post->price}}</h5>
                        <p class="fs-5 mb-4">{{ $post->description }}</p>
                        <p class="fs-5 mb-4">Numbers {{ $post->number_of_product }}</p>
                        <p class="fs-5 mb-4">Kind {{ $post->kind }}</p>
                    </section>
                </article>
                <!-- Comments section-->

            </div>

            </div>
        </div>
    </div>
    <!-- Footer-->
@endsection
