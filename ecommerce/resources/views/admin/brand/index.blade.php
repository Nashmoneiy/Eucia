
@extends('layouts.inc.app')

@include('admin.brand.modal-form')
@section('content')
<div>
    {{--editmodal--}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
              </button>
            </div>
            <form action="{{ url('/admin/brand/')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" id="brand_id" name="brand_id">
               
            <div class="modal-body">
              

              <div class="mb-3">
                <label>select cateory</label>
                <select name="category_id" id="category_id" required class="form-control">
                  <option value="">--select category--</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id}}" {{ $category->id == $brands->category_id ? 'selected':''}}>{{ $category->name }}</option>
                  
                  @endforeach
                </select>
                @error('name') <small class="text-danger">{{ $message }}</small>@enderror
              </div>

              


                <div class="mb-3">
                    <label>Brand Name</label>
                    <input type="text" class="form-control" required name="name" id="brand_name">
                    @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                  </div>
                  
                  <div class="mb-3">
                    <label>Brand slug</label>
                    <input type="text" class="form-control" required name="slug" id="brand_slug">
                    @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
                  </div>
                  <div class="mb-3">
                    <label>status</label>
                    <input type="checkbox"  name="status" >checked=visible, un-checked= hidden
                    @error('status') <small class="text-danger">{{ $message }}</small>@enderror
                  </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      {{--editmodal--}}


      {{--delete modal--}}
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin/brand/')}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete_id" name="delete_id">
        

        Are you sure you want to delete this brand?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </div>
    </form>
    </div>
  </div>
</div>
{{--delete modal--}}


    


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                    <h4>Brands list</h4>
                    <a href="#" class="btn btn-primary btn-sm float-end"data-bs-toggle="modal" data-bs-target="#brandModal">Add brand</a>
                    
                </div>
                <div class="card-body">
                  
                    @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
          
      @endif
                    <table class="table table-bordered table-stiped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>Category</th>
                                <th>slug</th>
                                <th>status</th>    
                                <th>action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                            <td>{{ $brand->id}}</td> 
                            <td>{{ $brand->name}}</td>

                            <td>
                              @if($brand->category)
                              {{ $brand->category->name}}
                              @else
                              No category
                              @endif
                            </td>
                            <td>{{ $brand->slug}}</td>
                            <td>{{ $brand->status ==1 ? 'visible':'hidden'}}</td>
                            
                            <td>
                                <button type="button" value="{{$brand->id}}" class="btn btn-dark editbtn btn-sm">Update</button>
                                <button type="button" value="{{$brand->id}}" class="btn btn-danger deletebtn btn-sm">Delete</button>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
                
            </div>

        </div>
    </div>
    
    
</div>




@endsection
@section('scripts')
<script>
    $(document).ready(function(){

        $(document).on('click', '.deletebtn', function () {
            var brand_id = $(this).val();
            
           // alert(brand_id);
            $('#deleteModal').modal('show');
            $('#delete_id').val(brand_id);

        })
        
   

        $(document).on('click', '.editbtn', function () {
            var brand_id = $(this).val();
            var category_id = $(this).val();
            //alert(brand_id);
            $('#editModal').modal('show');

            
            
            $.ajax({
                type:"GET",
                url:"{{ url('/admin/brand/') }}/"+ brand_id,
                success: function (response){
                    console.log(response);
                    $('#brand_name').val(response.brand.name);
                    $('#brand_slug').val(response.brand.slug);
                    $('#brand_status').val(response.brand.status);
                    $('#category_id').val(response.brand.category_id);
                   
                    $('#brand_id').val(brand_id);
                    

                }
            });
            
            
        });
    });
</script>

@endsection

