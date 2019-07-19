@extends('layouts/app') 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home')}}">Deshboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Product</li>
                            </ol>
                    </nav>
            </div>
            <div class="col-8 offset-2 ">
            
                <div class="card">
                    <div class="card-header bg-danger text-center text-light">
                        Deleted Product
                    </div>
                        <div class="card-body">
                            @if (session('restore_status'))
                                <div class="alert alert-danger">
                                    {{ session('restore_status') }}
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
                                                <a href="{{ url('/edit/product') }}/{{$product->id}}" class="btn btn-sm btn-info">Restore</a>
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
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
