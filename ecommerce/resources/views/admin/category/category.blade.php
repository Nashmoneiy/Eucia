@extends('layouts.inc.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>category</h4>
            </div>
            <div class="card-body">
               
                <form action="{{ url('admin/category')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>slug</label>
                        <input type="text" name="slug" class="form-control">
                        @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                        @error('description')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="custom-file-input">
                        @error('image')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" >
                    </div>

                    <div class="col-md-12">
                        <h5>Tags</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" class="form-control">
                        @error('meta_title')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md- mb-3">
                        <label>Meta keyword</label>  
                        <textarea name="meta_keyword" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta description</label>
                        <textarea name="meta_description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">      
                        <button type="submit" class="btn btn-primary float-end">save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection