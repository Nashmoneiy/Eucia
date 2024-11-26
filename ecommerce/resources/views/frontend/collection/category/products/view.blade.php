@extends('layouts.app')
@section('title' )
{{$products->meta_title}}
@endsection

@section('meta_keyword' )
{{$products->meta_keyword}}
@endsection
@section('meta_description' )
{{$products->meta_description}}
@endsection

@section('content')
<div class="py-3 py-md-5 bg-light">

    <div class="container">
        <div class="row product_data">
            <div class="col-md-5 mt-3">
                <div class="bg-white border">
                    @if($products->productImages)
                        <img src="{{asset ($products->productImages[0]->image )}}" class="w-100" alt="Img">
                        @else No image availale
                        @endif
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{$products->name}}
                        @if($products->quantity)
                        <label class="label-stock bg-success">In Stock</label>
                        @else
                        <label class="label-stock bg-danger">out of Stock</label>
                        @endif
                    </h4>
                    
                    <hr>
                    <p class="product-path">
                        Home / {{$products->category->name}} / {{$products->name}}
                    </p>
                    </p>
                    <div>
                        <span class="selling-price">${{$products->selling_price}}</span>

                        <span class="original-price">${{$products->original_price}}</span>
                    </div>
                    <div class="mt-2">
                        
                        <input type="hidden" value="{{$products->id}}" class="prod_id"/>
                        <div class="input-group">
                            <span class="btn btn1 decreaments-btn"><i class="fa fa-minus"></i></span>
                            <input type="text" name="quantity" value="1" class="inputs-quantity input-quantity" />
                            <span class="btn btn1 increaments-btn"><i class="fa fa-plus"></i></span>
                        </div>
                        
                    </div>
                    <div class="mt-2">
                        @if($products->quantity)
                        
                        <button type="button" class="btn btn1 addtocartBtn"> <i class="fa fa-shopping-cart"></i> Add To Cart</button> 
                        @else
                        
                        @endif
                           
                        <button type="button" class="btn btn1 addtoWishlistBtn"> <i class="fa fa-heart"></i> Add To Wishlist </button>
               
                        
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ty
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
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

    //add  to wishlist
    $(document).ready(function () {

        $('.addtoWishlistBtn').click(function (e) {
            e.preventDefault(e);
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
           // alert(product_id);
           $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

           $.ajax({
            method : "POST",
            url: "{{ url('/add-to-wishlist') }}",
            data:{
                'product_id' : product_id
            },
            success: function (response) {
                window.location.reload();
                alertify.set('notifier','position', 'top-right');
                alertify.success(response.status);
  
                
            }
           })

           

            
        })
//cart
        $('.addtocartBtn').click(function (e) {
            e.preventDefault(e);

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.inputs-quantity').val();
           // alert(product_id);
           $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

            $.ajax({
                method : "POST",
                url : "{{ url('/add-to-cart/') }}",
                data : {
                    'product_id' : product_id,
                    'product_qty' : product_qty,
                },
                success: function (response) {
                    window.location.reload();
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(response.status);
                   
                    
  

                }
            })

        });


       //increamanet

        $('.increaments-btn').click(function (e) {
            e.preventDefault(e);

            var inc_value = $('.inputs-quantity').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $('.inputs-quantity').val(value);
            }
            
        })
  

        //decreament
        $('.decreaments-btn').click(function (e) {
            e.preventDefault(e);

            var dec_value = $('.inputs-quantity').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $('.inputs-quantity').val(value);
            }
            
        })
    })




</script>

@endsection
