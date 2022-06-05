@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">

                <div class="card">
                    <div class="card-header">Edit Category
                        <a href="{{ url('/admin/category') }}" class="btn btn-secondary float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" placeholder="Enter Category Name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="status" id="isActive" {{ $category->status == 1 ? "checked":"" }}>
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