@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @if(session()->has('status'))
                    <div class="alert alert-success">{{ session()->get('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">Category
                        <a href="{{ url('/admin/add-product') }}" class="btn btn-secondary float-end">Add Product</a>
                    </div>
                    <div class="card-body">
                            
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$i=$i+1;}}</td>
                                    <td><img src="{{ asset('images/product/'.$product->image) }}" height='60' width='60'></td>
                                    <td>{{$product->category_name->name}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->status == 1 ? "Active":"Deactivate"}}</td>
                                    <td>
                                        <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('/admin/delete-product/'.$product->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection