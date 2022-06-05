@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()->has('status'))
                <div class="alert alert-success">{{ session()->get('status') }}</div>
            @endif
            <div class="row">
                @foreach($products as $product)
                <div class="col-sm-3 m-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/product/'.$product->image) }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">Description: {{$product->description}}</p>
                            <p><small>Category: {{$product->category_name->name}}</small></p>
                            <p><small>Price: {{$product->price}}</small></p>

                            <form action="{{ url('store-item') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}"  name="image">
                                <input type="hidden" value="{{ $product->category_id }}"  name="category_id">
                                <input type="hidden" value="1" name="quantity">
                                <button class="btn btn-primary">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection