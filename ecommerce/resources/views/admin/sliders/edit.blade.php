@extends('layouts.inc.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit slider</h4>
                <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-end">back</a>
                
            </div>
            <div class="card-body">
               
                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf      
                    @method('PUT')          
                        <div class="mb-3">
                          <label>Title</label>
                          <input type="text" name="title" value="{{ $slider->title}}" class="form-control"  >
                        </div>
                        <div class="mb-3">
                          <label>Description</label>
                          <textarea name="description"  class="form-control"  rows="3">{{ $slider->title}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file"  name="image" class="form-control"  />
                            <img src="{{ asset("$slider->image")}}" style="width:70px; height:70px" alt="slider">
                          </div>
                          <div class="mb-3">
                            <label>Status</label><br/>
                            <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked':''}} style="width: 30px; height:30px">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection