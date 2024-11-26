@extends('layouts.app')
@section('title', 'shop page')
@section('content')
<div class="container">
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::user()->name }}</div>

                <div class="card-body">
                    you are logged in as user !!
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection