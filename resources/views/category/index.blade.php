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
                        <a href="{{ url('/admin/add-category') }}" class="btn btn-secondary float-end">Add Category</a>
                    </div>
                    <div class="card-body">
                            
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$i=$i+1;}}</td>
                                    <td><img src="{{ asset('images/category/'.$category->image) }}" height='60' width='60'></td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->status == 1 ? "Active":"Deactivate"}}</td>
                                    <td>
                                        <a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger">Delete</a>
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