@extends('layouts.app')
@section('title','Search products' )



@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5 class="mt-3">Search results</h5>
        </div>
        @forelse ($searchProduct as $product)

            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        
                        @if ( $product->quantity > 0)
                        <label class="stock bg-success">In Stock</label>                            
                        @else                
                        <label class="stock bg-danger">Out of Stock</label> 
                        @endif

                        @if ($product->productImages->count() > 0)
                        <a href="{{url('/collection/'.$product->category->slug.'/'.$product->slug)}}">
                        <img src="{{asset($product->productImages[0]->image )}}" alt="{{$product->name}}"> 
                        </a>           
                        @endif
                        
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{$product->brand}}</p>
                        <h5 class="product-name">
                           <a href="{{url('/collection/'.$product->category->slug.'/'.$product->slug)}}" style="color: rgba(13, 66, 72, 0.551)">
                                {{$product->name}} 
                           </a>
                        </h5>
                        <div>

                            <span class="selling-price">${{$product->selling_price}}</span>
                            <span class="original-price">${{$product->original_price}}</span>
                        </div>
                        

                    </div>
                </div>
            </div>

                
            @empty
            <div class="card mb-12">
                
                <div class="card-body ">
                    <h6>Product not found</h6>
                </div>
            </div>
                
            @endforelse
    </div>
    
    

</div>


@endsection