@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">

                <div class="card">
                    <div class="card-header">Edit Product
                        <a href="{{ url('/admin/product') }}" class="btn btn-secondary float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">SELECT CATEGORY</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}" placeholder="Enter Product Name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter Product Description">{{ $product->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}" placeholder="Enter Product Price">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="status" id="isActive" {{ $product->status == 1 ? "checked":"" }}>
                                <label class="form-check-label" for="isActive">Active</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection