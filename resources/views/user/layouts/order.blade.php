@extends('parts.app')

@section('title','Kids-Page')

@Section('RegLog')
<li class="d-inline nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><a class="dropdown-item" href="#">Wishlist</a></li>
        <li><a class="dropdown-item" href="#">My Order</a></li>
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
    <li><a href="./contact.html">Explicabo Quia</a></li>
    <li><a href="./contact.html">Hic Ipsum</a></li>
@endsection

@section('content')
<h6 class="text-success fw-light" id="messageValidation"></h6>
<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Product_Id</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Taxes</th>
            <th>Price</th>
            <th>Total</th>
            <th>Kind</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>

            @forelse ($carts as $id => $cart)
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        {{$cart['id']}}
                    </td>
                    <td data-th="Product">
                        {{$cart['post_id']}}
                    </td>
                    <td data-th="name">
                        <h4 class="nomargin">{{ $cart->post['title'] }}</h4>
                    </td>
                    <td data-th="quantity">
                        {{$cart['quantity']}}
                    </td>
                    <td data-th="tax">${{ $cart->post['taxs'] }}</td>
                    <td data-th="Price" id="price" class="price">${{ $cart->post['price']}}</td>
                    <td data-th="total__{{$cart['id']}}" class="text-center total" id="total_{{$cart['id']}}" >{{ $cart->post['price'] * $cart['quantity'] + $cart->post['taxs'] }}</td>
                    <td data-th="male">${{ $cart->post['kind'] }}</td>
                    <td data-th="description">${{ $cart->post['description'] }}</td>
                </tr>
                @empty
                <h4> Thare No Product </h4>
            @endforelse


    </tbody>

</table>
@endsection




