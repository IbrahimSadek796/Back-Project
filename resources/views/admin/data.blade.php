@foreach ($latest as $post)
<div class="col-lg-3 col-md-6 col-sm-6  mix new-arrivals">

    <div class="product__item">
        {{-- data-setbg="{{ \Storage::url($post->image) }}" --}}
        <div class="product__item__pic set-bg" >
            <img src="{{ \Storage::url($post->image) }}" alt="" class="w-100 h-100">
            <span class="label"> {{ $post ['number_of_product'] }} </span>
            <ul class="product__hover">
                <li class="text-center"><a href="{{ route('admin.show', $post['id']) }}"><i class="fas fa-eye"></i> <span>Show</span></a></li>

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
