<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('item', compact('products'));
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item->cutomer_id = Auth::user()->id;
        $item->product_id = $request->id;
        $item->category_id = $request->category_id;
        $item->quantity = $request->quantity;
        $item->price = $request->price;
        $item->total = $request->price;
        $item->save();

        return redirect('/cart')->with('status','Item added successfully');
    }

    public function cart()
    {
        $items = Item::where([
            ['cutomer_id','=', Auth::user()->id]
        ])->get();
        return view('cart', compact('items'));
    }

    public function place_order($id)
    {
        $item = Item::find($id);
        $item->order_status = '1';
        $item->update();

        return redirect('/cart')->with('status', 'Order place succefully');
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        $item->delete();
        return redirect('/cart')->with('status', 'Item remove succefully');
    }
}
