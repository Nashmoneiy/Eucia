@extends('layouts.app')
@section('title', 'shop page')
@section('content')
@if (session('error'))
  <div class="alert alert-danger" role="alert">
      {{ session('error') }}
  </div>
@endif
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach ($sliders as $key => $slider)
  <div class="carousel-item active" {{ $key == '1' ? 'active':'' }} data-bs-interval="3000">
    @if($slider->image)
    <img src="{{ asset("$slider->image")}}" class="d-block w-100" alt="...">
    @endif
    
   <div class="carousel-caption d-none d-md-block">
        <div class="custom-carousel-content">
            <h1>
                {{ $slider->title}}
            </h1>
            <p>
                {{ $slider->description}}
            </p>
            <div>
                <a href="#" class="btn btn-slider">
                    Get Now
                </a>
            </div>

        </div>
    </div>
  </div>
  @endforeach
</div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

 

        <div class="py-3 py-md-5 bg-light ">

          <div class="container ">
              <div class="row">
                <div class="col-md-12">
                  <h5>Trending products</h5>
                  <div class="underline mb-4"></div>
                </div>
                @if ($trendings)
                
                  <div class="col-md-12">
                    <div class="owl-carousel owl-theme trending-product">
                    @foreach ($trendings as $product)

           
                <div class="product-card">
                    <div class="product-card-img">
                        

                        @if ( $product->quantity > 0)
                        <label class="stock bg-warning">Trending</label>                            
                        @endif

                        @if ($product->productImages->count() > 0)
                        <a href="{{url('/collection/'.$product->category->slug.'/'.$product->slug)}}">
                        <img src="{{asset($product->productImages[0]->image )}}" alt="{{$product->name}}" > 
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
                 
            @endforeach
          </div>

              </div>
              @else
              <div class="col-md-12">
                <div class="p-2">
                    <h5>No products availale for {{$category->name}}</h5>
                </div>
            </div>
          </div>
          @endif
      </div>


      <div class="py-3 py-md-5 bg-light">

        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h5>New Arrivals</h5>
                <div class="underline mb-4"></div>
              </div>
              @if ($newArrivals)
                  
              
                <div class="col-md-12">
                  <div class="owl-carousel owl-theme trending-product">
                  @foreach ($newArrivals as $newArrival)

         
              <div class="product-card">
                  <div class="product-card-img">
                      

                      @if ( $newArrival->quantity > 0)
                      <label class="stock bg-danger">New</label>                            
                      @endif

                      @if ($newArrival->productImages->count() > 0)
                      <a href="{{url('/collection/'.$newArrival->category->slug.'/'.$newArrival->slug)}}">
                      <img src="{{asset($newArrival->productImages[0]->image )}}" alt="{{$newArrival->name}}" > 
                      </a>           
                      @endif
                      
                  </div>
                  <div class="product-card-body">
                      <p class="product-brand">{{$newArrival->brand}}</p>
                      <h5 class="product-name">
                         <a href="{{url('/collection/'.$newArrival->category->slug.'/'.$newArrival->slug)}}" style="color: rgba(13, 66, 72, 0.551)">
                              {{$product->name}} 
                         </a>
                      </h5>
                      <div>

                          <span class="selling-price">${{$newArrival->selling_price}}</span>
                          <span class="original-price">${{$newArrival->original_price}}</span>
                      </div>
                      

                  </div>
              </div>
               
          @endforeach
        </div>

            </div>
            @else
            <div class="col-md-12">
              <div class="p-2">
                  <h5>No products availale for {{$category->name}}</h5>
              </div>
          </div>
        </div>
        @endif
    </div>
    
      
     
@endsection

@section('script')
<script>
  $('.trending-product').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection
