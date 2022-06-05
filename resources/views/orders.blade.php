@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @if(session()->has('status'))
                    <div class="alert alert-success">{{ session()->get('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">Customer Orders</div>
                    <div class="card-body">
                            
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$i=$i+1;}}</td>
                                    <td><img src="{{ asset('images/product/'.$order->product_details->image) }}" height='60' width='60'></td>
                                    <td>{{$order->user_details->name}}</td>
                                    <td>{{$order->product_details->name}}</td>
                                    <td>{{$order->product_details->price}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->total}}</td>
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

@section('javascript')
<script>
</script>

@endsection