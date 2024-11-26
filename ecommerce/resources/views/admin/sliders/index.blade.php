@extends('layouts.inc.app')


@section('content')






<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/admin/sliders/')}}" method="POST">
              @csrf
              @method('DELETE')
              <input type="hidden" id="delete_id" name="delete_id">
          
  
          Are you sure you want to delete this product?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </div>
      </form>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12">
      @if(session('status'))
      <div class="alert alert-danger">{{ session('status') }}</div>
      @endif


        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Sliders</h4>
                <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end">Add Slider</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @forelse($sliders as $slider)
                      <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->description }}</td>
                        <td>
                          <img src="{{ asset("$slider->image")}}" style="width:70px; height:70px" alt="slider">
                        </td>
                        <td>{{ $slider->status ==1 ? 'visible':'hidden'}}</td>
                        <td>
                          <a href="{{ url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-dark">Edit</a>
                          <button type="button" value="{{$slider->id}}" class="btn btn-danger deletebtn btn-sm">Delete</button>
                        </td>

                      </tr>
                      @empty
                      <tr>
                          <td colspan="7">No Slider Available</td>
                      </tr>
                      @endforelse
                        
                        
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
   $(document).on('click', '.deletebtn', function(){
    var slider_id = $(this).val();
           // alert(product_id);
           $('#deleteModal').modal('show');
           $('#delete_id').val(slider_id);
   })
</script>
@endsection