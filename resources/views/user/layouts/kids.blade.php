@extends('parts.app')

@section('title','Kids-Page')

@Section('RegLog')
<li class="d-inline nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
<ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('user.edit')}}">Profile</a></li>
    <li><a class="dropdown-item" href="{{route('user.orders')}}">My Order</a></li>
    <hr>
    <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
  </ul>
</li>

<li class="d-inline nav-item me-2"><a href="{{ route('user.shopping.cart') }}" class="text-danger"><i class="fas fa-cart-shopping"></i> My Cart</a></li>

<li class="d-inline nav-item"><a href="{{ route('logout') }}"
onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
 {{ __('Logout') }}</a>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form></li>
@endsection

@Section('links')
    <li class="active"><a href="{{route('user.')}}">Home</a></li>
    <li><a href="{{route('user.men')}}">Men</a></li>
    <li><a href="{{route('user.women')}}">Women</a></li>
    <li><a href="{{route('user.kids')}}">Kids</a></li>
@endsection

@section('content')

    <!-- Shop Section Begin -->
    <section class="shop spad">
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
                                                    <li><a href="{{route('user.shope')}}">All</a></li>
                                                    <li><a href="{{route('user.men')}}">Men </a></li>
                                                    <li><a href="{{route('user.women')}}">Women</a></li>
                                                    <li><a href="{{route('user.kids')}}">Kids</a></li>
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

                        @foreach ($kids as $post )

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{\Storage::url($post ['image'] ) }}">
                                    <span class="label"> {{ $post ['number_of_product'] }} </span>
                                    <ul class="product__hover">
                                        <li class="text-center"><a href="{{ route('user.show', $post['id']) }}"><i class="fas fa-eye"></i> <span>show</span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $post['title'] }}</h6>
                                    <a  onclick="addToCart({{$post['id']}})" class="add-cart btn btn-dark"> + Add To Cart</a>
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
                    {!! $kids->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    @endsection

    @section('scripts')
<script type="text/javascript">

    function addToCart(id) {
        var product_id = id;
        console.log(product_id);
        $.ajax({
            url:'{{route('user.addpost.to.cart')}}',
            datatype : 'json',
            type: 'post',
            data : {
               ' _token' : '{{ csrf_token() }}',
                'product_id': product_id
            },
            success : function (responce){

                swal.fire({
                    text: responce.msg,

                    imageWidth:50,
                    imageHeight:50,

                    timer:4000,
                    className: 'alert'

                });
            }

        })
    }

    </script>
@endsection
