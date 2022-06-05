@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @if(session()->has('status'))
                    <div class="alert alert-success">{{ session()->get('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">Cart</div>
                    <div class="card-body">
                            
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                    <th>Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($items as $item)
                                <tr>
                                    <td>{{$i=$i+1;}}</td>
                                    <td><img src="{{ asset('images/product/'.$item->product_details->image) }}" height='60' width='60'></td>
                                    <td>{{$item->product_details->name}}</td>
                                    <td>{{$item->product_details->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->total}}</td>
                                    @if($item->order_status=='0')
                                    <td>
                                        <a href="{{ url('delete-item-cart/'.$item->id) }}" class="btn btn-danger">Remove</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('item-order/'.$item->id) }}" class="btn btn-success">Place Order</a>
                                    </td>
                                    @else
                                        <td colspan="2" class="text-center">Order Place</td>
                                    @endif
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