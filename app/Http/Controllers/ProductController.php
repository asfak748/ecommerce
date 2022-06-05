<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extention;
            $file->move('images/product/', $filename);
            $product->image = $filename;
        }
        $product->status = $request->input('status') == true ? '1':'0';
        $product->created_by = Auth::user()->id;
        $product->save();

        return redirect('admin/product')->with('status', 'Product Added Successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if($request->hasFile('image'))
        {
            $destination_path = 'images/product/'.$product->image;
            if(File::exists($destination_path))
            {
                File::delete($destination_path);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extention;
            $file->move('images/product/', $filename);
            $product->image = $filename;
        }

        $product->status = $request->input('status') == true ? '1':'0';
        $product->updated_by = Auth::user()->id;
        $product->update();

        return redirect('admin/product')->with('status', 'Product updated succefully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $destination_path = 'images/product/'.$product->image;
        if(File::exists($destination_path))
        {
            File::delete($destination_path);
        }
        
        $product->delete();
        return redirect('admin/product')->with('status', 'Product delete succefully');
    }
}
