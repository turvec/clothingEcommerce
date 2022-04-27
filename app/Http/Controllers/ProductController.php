<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function add(){
        $category = Category::orderBy('name','asc')->get();
        return view('add_product',compact('category'));
    }
    public function store(Request $request)
    {
        $xtension = $request->file('image')->getClientOriginalExtension();
        $filename = \Str::slug($request->title).time().'.'.$xtension;
        $request->image->move(public_path('productcreate'),$filename);

        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description =  $request->description;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        // $product->category = $request->category;
        $product->image = $filename;
        $product->user_id = Auth::user()->id ;
        $product->save();

        return back();
    }
    public function Products()
    {

        $products = Auth::user()->products;
        return view('all_product', compact('products'));

    }
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('name','asc')->get();
        return view('edit_product',compact('product','categories'));
    }
    public function update(Request $request, Product $product)
    {
        $product->price = $request->price;
        $product->description =  $request->description;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        if ($request->has('image')) {
            $xtension = $request->file('image')->getClientOriginalExtension();
            $filename = \Str::slug($request->title).time().'.'.$xtension;
            $request->image->move(public_path('productcreate'),$filename);
            $product->image = $filename;
        }
        $product->save();
        return back();
    }
    public function delete(Product $product)
    {
        $product->delete();
        return back();
    }
    public function details($id)
    {
        $product = Product::find($id);
        return view('product-details',compact('product'));
    }
}
