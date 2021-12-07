<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::paginate(8);
        return view('admin.products.list', compact('products'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
        $product->price = $request->price;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('products.create');
    }

    function search(Request $request)
    {
        {
            $keyword = $request->input('keyword');
            if (!$keyword) {
                return redirect()->route('home.master');
            }
            $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
            $product = Product::all();
            return view('admin.orders.display', compact('products', 'product'));
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.update', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $product->image);
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
        $product->price = $request->price;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
