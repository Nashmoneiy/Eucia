@extends('layouts.app')
@section('title' )
{{$category->meta_title}}
@endsection

@section('meta_keyword' )
{{$category->meta_keyword}}
@endsection
@section('meta_description' )
{{$category->meta_description}}
@endsection

@section('content')
<div class="py-3 py-md-5 bg-light">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>

            <div class="col-md-2">
                
                <div class="card">
                    <div class="card-header"><h5>brands 
                        
                    </h5>
                        
                    
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $brand)
                        <form action="{{ url('/collection/'.$category->slug)}}" method="get">
                        <label class="d-block">
                            <input type="checkbox" name="brand[]"  value="{{$brand->name}}" /> 
                            {{$brand->name}}
                        </label>
                            
                        @endforeach
                        <button class="btn btn-info btn-sm float-end" ><i class="fa fa-filter"></i>Filter</button>
                        
                    </div>
                </div>
                </form>
            </div>


           @forelse ($products as $product)

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
            <div class="col-md-12">
                <div class="p-2">
                    <h5>No products availale for {{$category->name}}</h5>
                </div>
            </div>
                
            @endforelse

            
            
                </div>
            </div>
        </div>
        

@endsection
@section('scripts')
<script>
//     $(document).ready(function () {
   

//        loadCart();
  
   
// })
</script>
@endsection