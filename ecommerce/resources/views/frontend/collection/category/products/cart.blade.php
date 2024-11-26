@extends('layouts.app')
@section('title' )

@endsection

@section('content')

<div class="py-3 py-md-5 ">
    <div class="container">

        <div class="card">
            <div class="card-header">My cart</div>

            @if ($carts->count() > 0)

        <div class="row">
            <div class="col-md-11">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">

                        <div class="row">
                            <div class="col-md-6">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>

                    @php $total = 0; @endphp

                    @foreach($carts as $cart)

                    <div class="cart-item">
                        
                        <div class="row product_data">
                            <div class="col-md-6 my-auto">

                                <a href="">
                                    <label class="product-name">
                                        <img src="{{ asset($cart->products->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                        {{$cart->products->name}}
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-2 my-auto">
                                <label class="price">${{$cart->products->selling_price}}</label>
                            </div>
                            <div class="col-md-2 col-7 my-auto">
                                <input type="hidden" value="{{$cart->prod_id}}" class="prod_id"/>
                                <div class="quantity">
                                    @if($cart->products->quantity > $cart->prod_qty)
                                    <div class="input-group">
                                        <span class="btn btn1 primary changeQuantity decreament-btn"><i class="fa fa-minus"></i></span>
                                        <input type="text" name="quantity" value="{{ $cart->prod_qty}}" class="input-quantity input-quantity" />
                                        <span class="btn btn1 changeQuantity increament-btn"><i class="fa fa-plus"></i></span>
                                    </div>
                                    @php $total += $cart->products->selling_price * $cart->prod_qty; @endphp
                                                @else
                                                <h6>Out of stock</h6>
                                                @endif
                                </div>
                            </div>

                            <div class="col-md-2 col-5 my-auto">
                                <div class="remove">
                                    <button type="button" class="btn btn-danger btn-sm delete-cart-item">
                                        <i class="fa fa-trash"></i> Remove
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                
                <div class="card-footer">
                    <h6>Total Price : ${{ $total}}</h6>
                    
                </div>
                <div class="">
                    <a href="{{ url('/checkout')}}" class="btn btn-outline-success float-end">proceed to checkout</a>
                </div>

                @else
                <div class="card-body">
                    <h6>no item in your cart</h6>
                </div>

                @endif
               

            </div>
         </div>

       
        </div>
    

    </div>
</div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<script>
    $(document).ready(function () {
        $('.increament-btn').click(function (e) {
            e.preventDefault(e);

            //var inc_value = $('.input-quantity').val();
            var inc_value = $(this).closest('.product_data').find('.input-quantity').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
               // $('.input-quantity').val(value);
               $(this).closest('.product_data').find('.input-quantity').val(value);
            }
            
        })

        //decreament
        $('.decreament-btn').click(function (e) {
            e.preventDefault(e);

           // var dec_value = $('.input-quantity').val();
           var dec_value = $(this).closest('.product_data').find('.input-quantity').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
               // $('.input-quantity').val(value);
               $(this).closest('.product_data').find('.input-quantity').val(value);
            }
            
        })

//delete

        $('.delete-cart-item').click(function (e) {
            e.preventDefault(e);

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            //alert(prod_id);

           $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

           $.ajax({
            method : "POST",
            url : "{{ url('/delete-cart-item/') }}",
            data : {
                'prod_id' : prod_id,
            },
            success : function(response) {
                window.location.reload();
                alertify.set('notifier','position', 'top-right');
                alertify.success(response.status);
            }
           })

            
        })
//change

        $('.changeQuantity').click(function (e){
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.input-quantity ').val();
            //alert(prod_id);

            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

            $.ajax({
                method : "POST",
                url: "{{ url('/update-cart/') }}",
                data : {
                'prod_id' : prod_id,
                'prod_qty' : qty
            },
                success: function (response) {
                    window.location.reload();           
                     }
            })

        })
  
        
    })
</script>
@endsection
