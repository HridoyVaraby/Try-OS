@extends('layouts/app') 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Deshboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('add/product/view')}}">Product list</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$single_product_info->product_name}}</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header bg-warning">
                        <center>Edit Product</center>
                    </div>
                    <div class="card-body">
                        @if (session('updatestatus'))
                            <div class="alert alert-success">
                                {{ session('updatestatus') }}
                            </div>
                        @endif
                        <form action="{{ url('/edit/product/insert')}}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="product_id" value="{{ $single_product_info->id }}">                            
                            <div class="form-group">
                              <label>Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="{{ $single_product_info->product_name }}" placeholder="Enter product name">
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="product_description" class="form-control"  rows="2">{{ $single_product_info->product_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" class="form-control" name="product_price" value="{{ $single_product_info->product_price }}" placeholder="Enter product price">
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="text" class="form-control" name="product_quantity" value="{{ $single_product_info->product_quantity }}" placeholder="Enter product quantity">
                            </div>
                            <div class="form-group">
                                <label>Alart Quantity</label>
                                <input type="text" class="form-control" name="alart_quantity" value="{{ $single_product_info->alart_quantity }}" placeholder="Enter alart quantity">
                            </div>

                            <button type="submit" class="btn btn-warning">Save Product</button>
                        </form>      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
