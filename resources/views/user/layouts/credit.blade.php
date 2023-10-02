
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

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Taxes</th>
                                <th class="">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp

                            @forelse ($carts as $id => $cart)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img style="width: 100px" src="{{\Storage::url($cart->post['image']) }}" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $cart->post['title'] }}</h6>
                                        <input name="price" class="price_{{$cart['id']}}" type="hidden" value="{{ $cart->post['price']}}" />
                                        <h5 data-th="Price" id="price" class="price">${{ $cart->post['price']}}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity d-flex justify-content-center">

                                        <button class="btn btn-link px-2 d-inline" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); updateCart({{$cart['id']}})"><i class="fas fa-minus"></i></button>
                                        <input id="form1" min="0" name="quantity" value="{{$cart['quantity']}}" type="number" class="form-control p-0 w-25 text-center d-inline form-control-sm qty_{{$cart['id']}}" />
                                        <button class="btn btn-link px-2 d-inline" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); updateCart({{$cart['id']}})"><i class="fas fa-plus"></i></button>

                                    </div>
                                </td>
                                <input class="tax_{{$cart['id']}}" type="hidden" value="{{ $cart->post['taxs']}}" />
                                <td data-th="tax">${{ $cart->post['taxs'] }}</td>
                                <td class="cart__price total col-md-2"data-th="total__{{$cart['id']}}" id="total_{{$cart['id']}}" >@if ($cart['quantity']==0)
                                    0
                                    @else
                                    {{($cart->post['price'] * $cart['quantity']) + $cart->post['taxs']}}
                                @endif</td>

                                <td class="actions">
                                    <form class="d-inline" action="{{ route('user.delete.cart.product', $cart['id']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @php
                            if ($cart['quantity'] !=0) {
                                # code...
                                $total+=($cart->post['price'] * $cart['quantity'])+ $cart->post['taxs'];
                            }else {
                                # code...
                                $total+=0;
                            }

                             @endphp
                            @empty
                                <h4> Thare No Product </h4>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{ route('user.') }}">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="{{ route('user.shopping.cart') }}"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span id="demo">{{$total}}</span></li>
                        {{-- <li>Total <span>$ 169.50</span></li> --}}
                    </ul>
                    <a href="#" id="alert" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection

@section('scripts')
<script type="text/javascript">
function total() {
    const x = document.getElementsByClassName("total");
    let total = 0;
    for (let i = 0; i < x.length; i++) {
            var z = Number(x[i].innerHTML)
            total += z;
        }
        console.log(total);
    document.getElementById("demo").innerHTML = total;
}


function updateCart(id) {
    var quantity = $('.qty_'+id).val();
    var price = $('.price_'+id).val();
    var tax = $('.tax_'+id).val();
    console.log(tax)

    var totalProduct = (price * quantity);
    if (totalProduct !=0) {
        totalToProduct = totalProduct + (+tax);
    }else{
        totalToProduct = 0;
    }

    console.log(typeof(tax));
    console.log(typeof(totalProduct));

    console.log(typeof(totalToProduct));
    var subTotal = 0;
    document.getElementById('total_'+id).innerHTML=totalToProduct,
    total();

    $.ajax({
        url : '{{route('user.update.sopping.cart')}}',
        method : 'patch',
        datatype : 'json',
        data : {
            ' _token' : '{{ csrf_token() }}',
            'id' : id,
            'quantity' : quantity,
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

let alert = document.getElementById('alert');
alert.addEventListener('click',function(){
    swal.fire({
        title:'Confirm To Exit',
        text:'Are you want to confirm your order',

        imageWidth:50,
        imageHeight:50,

        timer:4000,
        className: 'alert'

    });
})
</script>
@endsection
