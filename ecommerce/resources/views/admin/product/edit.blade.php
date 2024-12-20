@extends('layouts.inc.app')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Products</h4>
                
                <a href="{{ url('admin/product/index') }}" class="btn btn-danger btn-sm float-end">back</a>
                
            </div>

            @if(session('message'))
            <p class="alert alert-success">product image removed</p>
            @endif


            <div class="card-body">

              @if ($errors->any())
              <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
              </div>
              @endif



              <form action="{{ url('admin/product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Home
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                        SEO Tags
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                        Details
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                        Images
                    </button>
                    </li>
                  </ul>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="mb-3">
                            <label>Select category</label>
                            <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}" {{ $category->id == $product->category_id ? 'selected':''}}>
                                {{ $category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>product name</label>
                          <input type="text" name="name" value="{{$product->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label>product slug</label>
                          <input type="text" name="slug" value="{{$product->slug}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name="brand" class="form-control">
                            @foreach($brands as $brand)
                            <option value="{{ $brand->name}}" {{$brand->name == $product->brand ?'selected':''}}>
                                {{ $brand->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>Small Description (500 words)</label>
                          <textarea name="small_description" class="form-control"  rows="3">{{ $product->small_description }}</textarea>
                        </div>
                        <div class="mb-3">
                          <label>Description</label>
                          <textarea name="description" class="form-control"  rows="3">{{ $product->description }}</textarea>
                        </div>

                        
                       
                        

                    </div>
                    <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                      <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description"  class="form-control"  rows="3">{{ $product->meta_description }}</textarea>
                      </div>
                      <div class="mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control"  rows="3">{{ $product->meta_keyword }}</textarea>
                      </div>  
                    </div>

                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                       <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label>Original price</label>
                            <input type="number" name="original_price" value="{{ $product->original_price }}" class="form-control" >
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="mb-3">
                            <label>Selling price</label>
                            <input type="number" name="selling_price" value="{{ $product->selling_price }}" class="form-control" >
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="mb-3">
                            <label></label>Quantity
                            <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label>Trending</label>
                            <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked':''}} style="width: 30px; height:30px">
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label>Status</label>
                          <input type="checkbox" name="status" {{ $product->trending == '1' ? 'checked':''}} style="width: 30px; height:30px">
                      </div>

                       </div>
                    </div>



                    <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                      <div class="mb-3">
                        <label>Upload product images</label>
                        <input type="file" multiple name="image[]" class="form-control"/>
                      </div>
                      <div>
                       @if($product->productImages) 
                       <div class="row">
                        @foreach($product->productImages as $image)
                        <div class="col-md-2">
                            <img src="{{ asset($image->image)}}" style="width: 70px;height:70px;" class="me-4 border" alt="img">
                       <a href="{{ url('admin/product/'.$image->id.'/delete') }}" class="d-block">remove</a>
                            
                            
                        </div>
                        @endforeach
                       </div>

                        @else
                        <h5>No image added</h5>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div>
                    
                    <button type="submit" class=" btn btn-primary btn-sm float-end">Update</button>
                  </div>
              </form>
               
            </div>
        </div>
    </div>
</div>


@endsection