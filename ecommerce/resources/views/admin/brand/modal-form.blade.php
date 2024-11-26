

<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add brands</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action= "{{ url('admin/brand')}}" method="POST" enctype="multipart/form-data">
          @csrf
         

        <div class="modal-body">
          <div class="mb-3">
            <label>select cateory</label>
            <select name="category_id"  required class="form-control">
              <option value="">--select category--</option>
              @foreach($categories as $category)
              <option value="{{ $category->id}}" id="category_id" name="category_id">{{ $category->name}}</option>
             
              @endforeach
            
            </select>
            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          
          <div class="mb-3">
            <label>Brand Name</label>
            <input type="text" class="form-control" name="name">
            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          
          <div class="mb-3">
            <label>Brand slug</label>
            <input type="text" class="form-control" name="slug">
            @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="mb-3">
            <label>status</label>
            <input type="checkbox" name="status">checked=visible, un-checked= hidden
            @error('status') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  


  <div class="modal fade" id="updatebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add brands</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action= "{{ url('admin/brand')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
          
          <div class="mb-3">
            <label>Brand Name</label>
            <input type="text" class="form-control" name="name">
            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          
          <div class="mb-3">
            <label>Brand slug</label>
            <input type="text" class="form-control" name="slug">
            @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="mb-3">
            <label>status</label>
            <input type="checkbox" name="status">checked=Hidden, un-checked= visible
            @error('status') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>















