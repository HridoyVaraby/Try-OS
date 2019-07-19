@extends('layouts/app') 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home')}}">Deshboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('add/product/view')}}">View Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                            </ol>
                        </nav>
            </div>
            <div class="col-4 offset-4">
                <div class="card">
                    <div class="card-header bg-info">
                        <center>Add Product</center>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <li>{{ $error }}</li>
                            </div>
                            
                        @endforeach
                        <form action="{{ url('/add/product/insert')}}" method="post">
                            @csrf
                            <div class="form-group">
                              <label>Product Name</label>
                            <input type="text" class="form-control" name="product_name" placeholder="Enter product name" value="{{ old('product_name') }}">
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="product_description" class="form-control"  rows="2">{{ old('product_description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" class="form-control" name="product_price" placeholder="Enter product price" value="{{ old('product_price') }}">
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="text" class="form-control" name="product_quantity" placeholder="Enter product quantity" value="{{ old('product_quantity') }}">
                            </div>
                            <div class="form-group">
                                <label>Alart Quantity</label>
                                <input type="text" class="form-control" name="alart_quantity" placeholder="Enter alart quantity" value="{{ old('alart_quantity') }}">
                            </div>

                            <button type="submit" class="btn btn-info">Add Product</button>
                        </form>      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection