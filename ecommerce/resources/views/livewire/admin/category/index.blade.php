
<div class="container">
  @if (session('message'))
<div class="alert alert-success" role="alert">
    {{ session('message') }}
</div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>image</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                            <td>{{ $key + 1 }}</td> 
                            <td>{{ $category->name}}</td>
                            <td>{{ $category->status ==1 ? 'visible':'hidden'}}</td>
                            
                            <td>
                                <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-dark">Edit</a>
                                <a href="{{ url('admin/delete-category/'.$category->id)}}" class="btn btn-danger">Delete</a>
                                
                            </td>
                            <td> <img src="{{ asset("$category->image")}}" width="60px" height="60px" /></td>
                            @endforeach
                            </tr>
                        </tbody>
                        
                    </table>
                    <div>
                    {{ $categories->links()}}
                </div>
                
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>

