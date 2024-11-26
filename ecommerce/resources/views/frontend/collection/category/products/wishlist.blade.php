@extends('layouts.app')
@section('title' )

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">My {{ __('Wishlist') }}</div>

                <div class="card-body">
                    @if ($wishlists->count() > 0)
              <div class="py-3 py-md-5 bg-">
                            <div class="container">
                        
                                <div class="row ">
                                    <div class="col-md-20 justify-content">
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
                                                        <h4>Remove</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            @foreach ($wishlists as $wishlist)
                                                
                                            
                    
                                            <div class="cart-item">
                                                <div class="row product_data">
                                                    <div class="col-md-6 my-auto">

                                                        <input type="hidden" value="{{ $wishlist->product_id}}" class="product_id" />
                    
                                                        <a href="">
                                                            <label class="product-name">
                                                                <img src="{{asset($wishlist->products->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="">
                                                                {{ $wishlist->products->name }}
                                                            </label>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <label class="price">$ {{$wishlist->products->selling_price}} </label>
                                                    </div>
                                                    
                    
                                                    <div class="col-md-2 col-5 my-auto">
                                                        <div class="remove">
                                                            <button type="button" class="btn btn-danger btn-sm delete-wishlist-item">
                                                                <i class="fa fa-trash"></i> Remove
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                                 
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                      
                        
                    @else
                    <h6>There are no products in your wishlist</h6>
                        
                    @endif
                    
                    
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>

   
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.delete-wishlist-item').click(function (e) {
    e.preventDefault(e);
    var product_id = $(this).closest('.product_data').find('.product_id').val();
    //alert(product_id);
    

    $.ajax({
            method : "POST",
            url : "{{ url('delete-wishlist-item') }}",
            data : {
                'product_id' : product_id,
            },
            success : function(response) {
                window.location.reload();
                alertify.set('notifier','position', 'top-right');
                alertify.success(response.status);
            }
           })

})



    })
</script>

@endsection
