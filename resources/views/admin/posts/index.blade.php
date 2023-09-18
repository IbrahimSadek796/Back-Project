@extends('parts.app')

@section('title','Shope-Page')
@Section('RegLog')
<a href="#">{{ Auth::user()->name }}</a>
<a href="{{ route('logout') }}"
onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
 {{ __('Logout') }}</a>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endsection

@Section('links')
    <li class="active"><a href="{{route('admin.')}}">Home</a></li>
    <li><a href="{{route('admin.men')}}">Men</a></li>
    <li><a href="{{route('admin.women')}}">Women</a></li>
    <li><a href="{{route('admin.kids')}}">Kids</a></li>
    <li><a href="{{route('admin.users.index')}}">Users</a></li>
    <li><a href="{{route('admin.posts.create')}}">Hic Ipsum</a></li>
@endsection

@section('content')


    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="py-3">
            <a class="float-end btn btn-primary" href="{{ route('admin.posts.create') }}">Add Post</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="{{route('admin.posts.index')}}">All</a></li>
                                                    <li><a href="{{route('admin.men')}}">Men </a></li>
                                                    <li><a href="{{route('admin.women')}}">Women</a></li>
                                                    <li><a href="{{route('admin.kids')}}">Kids</a></li>
                                                    <li><a href="{{route('admin.users.index')}}">Users</a></li>
                                                    <li><a href="{{route('admin.posts.create')}}">Hic Ipsum</a></li>
                                                    <li><a href="#">Maxime Inventor</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="row">
                        @foreach ($posts as $post )
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{\Storage::url($post['image']) }}">
                                    <span class="label"> {{ $post ['number_of_product'] }} </span>
                                    <ul class="product__hover">
                                        <li class="text-center"><a href="{{ route('admin.posts.show', $post['id']) }}"><i class="fas fa-eye"></i> <span>Show</span></a></li>
                                        <li class="text-center"><a href="{{ route('admin.posts.edit', $post['id']) }}"><i class="fas fa-pen-fancy text-dark"></i> <span>Edit</span></a></li>

                                        <form class="d-inline" action="{{ route('admin.posts.destroy', $post['id']) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <li class="text-center"><button ><i class="fas fa-trash text-danger"></i></button><span>Delete</span></li>

                                        </form>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{$post ['title']}}</h6>

                                    <div class="rating">
                                        @for ($i = 1 ; $i <= $post['quality'] ; $i++)
                                            <i class="fa fa-star text-warning"></i>
                                        @endfor

                                        @for ($i = 1 ; $i <= (5-$post['quality']) ; $i++)
                                            <i class="fa fa-star-o"></i>
                                        @endfor
                                    </div>
                                    <h5>{{$post ['price']}}</h5>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    {!! $posts->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    @endsection
