<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers;

class Productcontroller extends Controller
{
    //
    function index()
    {
        $products = Product::get();
        return view('admin.product', ['products' => $products]);
    }

    public function admin_show($id)
    {
        $product = Product::find($id);
        return view('admin.show_product', ['products' => $product]);
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show_product', ['products' => $product]);
    }
    function update($id)
    { 

        $product = Product::find($id);
        return view('product.update', compact('product'));
    }
    function destroy($id)
    { 

        Product::where('id', $id)->delete();
        return redirect()->route('product.show');
    }
    public function edit($id, Request $request)
    { 

        $product = Product::find($id);

        // Validate the request data
        $validated = $request->validate([
            'product_name' => 'required|max:40',
            'product_price' => 'required',
            'product_availability' => 'required',
            'product_picture' => 'required|nullable|image',
            'category_id' => 'required',
        ]);
        $filename = '/assets/img/' . time() . '.' . $request->product_picture->extension();
        $request->product_picture->move(public_path('assets/img'), $filename);
        $validated['product_picture'] = $filename;


        $product->update($validated);

        return redirect()->route('admin.show_product', $product->id);
    }
    function create(Request $request)
    { 

        $validated = $request->validate([
            'product_name' => 'required|max:30',
            'product_price' => 'required',
            'product_availability' => 'required',
            'product_picture' => 'required',
            'category_id' => 'required',
        ]);


        $filename = '';
        $filename = '/assets/img/' . time() . '.' . $request->product_picture->extension();
        $request->product_picture->move(public_path('/assets/img/'), $filename);
        $validated['product_picture'] = $filename;
        Product::create($validated);
        return redirect()->route('product.show');
    }

    public function search($id, Request $request)
    {
        $category = Category::find($id);
        $query = $request->input('query');


        $products = Product::where('product_name', 'LIKE', '%' . $query . '%')
            ->where('category_id', $category->id)
            ->get();

        return view('category.show', compact('category', 'products'));
    }


}