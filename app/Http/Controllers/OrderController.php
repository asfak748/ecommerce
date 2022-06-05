<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Item::where([
            ['order_status','=', 1]
        ])->get();
        return view('orders', compact('orders'));
    }
}
