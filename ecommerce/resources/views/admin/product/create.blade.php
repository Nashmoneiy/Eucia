@extends('layouts.inc.app')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Products</h4>
                
                <a href="{{ url('admin/product/index') }}" class="btn btn-danger btn-sm float-end">back</a>
                
            </div>
            <div class="card-body">

              @if ($errors->any())
              <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
              </div>
              @endif

              <form action="{{ url('admin/product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
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
                              <option value="">--select category--</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>product name</label>
                          <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label>product slug</label>
                          <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name="brand" class="form-control">
                              <option value="">--select brand--</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id}}">{{ $brand->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>Small Description</label>
                          <textarea name="small_description" class="form-control"  rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                          <label>Description</label>
                          <textarea name="description" class="form-control"  rows="3"></textarea>
                        </div>

                        
                       
                        

                    </div>
                    <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                      <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control"  rows="3"></textarea>
                      </div>
                      <div class="mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control"  rows="3"></textarea>
                      </div>  
                    </div>

                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                       <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label>Original price</label>
                            <input type="number" name="original_price" class="form-control" >
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="mb-3">
                            <label>Selling price</label>
                            <input type="number" name="selling_price" class="form-control" >
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="mb-3">
                            <label></label>Quantity
                            <input type="number" name="quantity" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label>Trending</label>
                            <input type="checkbox" name="trending" style="width: 30px; height:30px">
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label>Status</label>
                          <input type="checkbox" name="status" style="width: 30px; height:30px">
                      </div>

                       </div>
                    </div>



                    <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                      <div class="mb-3">
                        <label>Upload product images</label>
                        <input type="file" multiple name="image[]" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
               
            </div>
        </div>
    </div>
</div>


@endsection