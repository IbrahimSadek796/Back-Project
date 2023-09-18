@extends('parts.app')

@Section('title')
Home Page
@endsection

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
    <li><a href="{{route('admin.users.index')}}">User</a></li>
    <li><a href="{{route('admin.posts.create')}}">Hic Ipsum</a></li>
@endsection

@section('content')
<!-- Hero Section Begin -->
<section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{url('img/banner/banner-1.jpg')}}" alt="">
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{url('img/banner/banner-2.jpg')}}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>HOT COLLECTION</h2>

                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod, iste sed corrupti amet et odio ipsum provident inventore nulla ea eos ut debitis aliquam doloribus. </p>
                            <a href="{{route('admin.posts.index')}}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{url('img/banner/banner-3.jpg')}}" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->


    <!-- Product Section Begin -->
    <section class="product spad py-3">
        <div class="container">
            <h2 class="text-center">Featured Items</h2>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".men">Men</li>
                        <li data-filter=".women">Women</li>
                        <li data-filter=".child">Kids</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($array as $post)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix ">

                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ \Storage::url($post['image']) }}">
                            <span class="label"> {{ $post ['number_of_product'] }} </span>
                            <ul class="product__hover">
                                <li class="text-center"><a href="#"><i class="fas fa-eye"></i> <span>Show</span></a></li>

                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $post['title'] }}</h6>

                            <div class="rating">
                                @for ($i = 1 ; $i <= $post['quality'] ; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor

                                @for ($i = 1 ; $i <= (5-$post['quality']) ; $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            </div>
                            <h5>${{ $post['price'] }}</h5>

                        </div>
                    </div>

                </div>
                @endforeach

                @foreach ($men as $post)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix men">

                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ \Storage::url($post['image']) }}">
                            <span class="label"> {{ $post ['number_of_product'] }} </span>
                            <ul class="product__hover">
                                <li class="text-center"><a href="#"><i class="fas fa-eye"></i> <span>Show</span></a></li>

                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $post['title'] }}</h6>

                            <div class="rating">
                                @for ($i = 1 ; $i <= $post['quality'] ; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor

                                @for ($i = 1 ; $i <= (5-$post['quality']) ; $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            </div>
                            <h5>${{ $post['price'] }}</h5>

                        </div>
                    </div>

                </div>
                @endforeach

                @foreach ($women as $post)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix women">

                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ \Storage::url($post['image']) }}">
                            <span class="label"> {{ $post ['number_of_product'] }} </span>
                            <ul class="product__hover">
                                <li class="text-center"><a href="#"><i class="fas fa-eye"></i> <span>Show</span></a></li>

                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $post['title'] }}</h6>

                            <div class="rating">
                                @for ($i = 1 ; $i <= $post['quality'] ; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor

                                @for ($i = 1 ; $i <= (5-$post['quality']) ; $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            </div>
                            <h5>${{ $post['price'] }}</h5>

                        </div>
                    </div>

                </div>
                @endforeach

                @foreach ($kids as $post)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix child">

                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ \Storage::url($post['image']) }}">
                            <span class="label"> {{ $post ['number_of_product'] }} </span>
                            <ul class="product__hover">
                                <li class="text-center"><a href="#"><i class="fas fa-eye"></i> <span>Show</span></a></li>

                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $post['title'] }}</h6>

                            <div class="rating">
                                @for ($i = 1 ; $i <= $post['quality'] ; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor

                                @for ($i = 1 ; $i <= (5-$post['quality']) ; $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            </div>
                            <h5>${{ $post['price'] }}</h5>

                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        {{-- {!! $posts->links('pagination::bootstrap-5') !!} --}}
        </div>
    </section>
    <!-- Categories Section End -->


        <section class="categories spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="categories__text">
                            <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories__hot__deal">
                            <img src="{{url('img/product-sale.png')}}" alt="">
                            <div class="hot__deal__sticker">
                                <span>Sale Of</span>
                                <h5>$29.99</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="categories__deal__countdown">
                            <span>Deal Of The Week</span>
                            <h2>Multi-pocket Chest Bag Black</h2>

                            <a href="{{route('admin.posts.index')}}" class="primary-btn">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Section End -->


    <section class="product spad py-3">
        <div class="container">
            <h2 class="text-center py-5">Latest Iems</h2>

            <div class="row product__filter">
                @foreach ($latest as $post)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">

                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ \Storage::url($post['image']) }}">
                            <span class="label"> {{ $post ['number_of_product'] }} </span>
                            <ul class="product__hover">
                                <li class="text-center"><a href="#"><i class="fas fa-eye"></i> <span>Show</span></a></li>

                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $post['title'] }}</h6>

                            <div class="rating">
                                @for ($i = 1 ; $i <= $post['quality'] ; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor

                                @for ($i = 1 ; $i <= (5-$post['quality']) ; $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            </div>
                            <h5>${{ $post['price'] }}</h5>

                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            {!! $latest->links('pagination::bootstrap-5') !!}
        </div>

    </section>

@endsection
