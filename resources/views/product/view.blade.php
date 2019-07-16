@extends('layouts/app') 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 offset-9">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home')}}">Deshboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                            </ol>
                        </nav>
            </div>
            <div class="col-4 ">
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

            <div class="col-8 ">
                <div class="card">
                    <div class="card-header bg-success">
                        <center>Product List</center>
                    </div>
                    <div class="card-body">
                        @if (session('delete_status'))
                            <div class="alert alert-danger">
                                {{ session('delete_status') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Alart Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <th>{{$loop->index + 1}}</th>
                                        <th>{{$product->product_name}}</th>
                                        <th>{{str_limit($product->product_description, 30)}}</th>
                                        <th>{{$product->product_price}}</th>
                                        <th>{{$product->product_quantity}}</th>
                                        <th>{{$product->alart_quantity}}</th>
                                        <th class="btn-group">
                                            <a href="{{ url('/edit/product') }}/{{$product->id}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ url('/delete/product') }}/{{$product->id}}" class="btn btn-sm btn-danger">Delete</a>
                                        </th>
                                    </tr> 
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="7">No data found.</td>
                                        </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>

            <div class="col-8 offset-4 ">
            
                <div class="card">
                    <div class="card-header bg-danger text-center text-light">
                        Deleted Product
                    </div>
                        <div class="card-body">
                            @if (session('delete_status'))
                                <div class="alert alert-danger">
                                    {{ session('delete_status') }}
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Alart Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($deleted_products as $product)
                                        <tr>
                                            <th>{{$loop->index + 1}}</th>
                                            <th>{{$product->product_name}}</th>
                                            <th>{{str_limit($product->product_description, 30)}}</th>
                                            <th>{{$product->product_price}}</th>
                                            <th>{{$product->product_quantity}}</th>
                                            <th>{{$product->alart_quantity}}</th>
                                            <th class="btn-group">
                                                <a href="{{ url('/edit/product') }}/{{$product->id}}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ url('/delete/product') }}/{{$product->id}}" class="btn btn-sm btn-danger">Delete</a>
                                            </th>
                                        </tr> 
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="7">No data found.</td>
                                            </tr>
                                    @endforelse
                                </tbody>
                            </table>
                                {{ $products->links() }}
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
