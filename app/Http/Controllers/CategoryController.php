<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extention;
            $file->move('images/category/', $filename);
            $category->image = $filename;
        }
        $category->status = $request->input('status') == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category')->with('status', 'Category Added Successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');

        if($request->hasFile('image'))
        {
            $destination_path = 'images/category/'.$category->image;
            if(File::exists($destination_path))
            {
                File::delete($destination_path);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extention;
            $file->move('images/category/', $filename);
            $category->image = $filename;
        }

        $category->status = $request->input('status') == true ? '1':'0';
        $category->updated_by = Auth::user()->id;
        $category->update();

        return redirect('admin/category')->with('status', 'Category updated succefully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $destination_path = 'images/category/'.$category->image;
        if(File::exists($destination_path))
        {
            File::delete($destination_path);
        }
        
        $category->delete();
        return redirect('admin/category')->with('status', 'Category delete succefully');
    }
}
