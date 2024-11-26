@extends('layouts.inc.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit category</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $category->name}}" class="form-control">
                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>slug</label>
                        <input type="text" name="slug" value="{{ $category->slug}}" class="form-control">
                        @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"  rows="3">{{ $category->description}}</textarea>
                        @error('description')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" value="{{ $category->image}}">
                        <img src="{{ asset("$category->image")}}" width="60px" height="60px" />
                        
                        @error('image')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':''}}>
                    </div>

                    
                    <div class="col-md-12 mb-3">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title}}">
                    </div>
                    <div class="col-md- mb-3">
                        <label>Meta keyword</label>  
                        <textarea name="meta_keyword" class="form-control" rows="2">{{ $category->meta_keyword}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">      
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection