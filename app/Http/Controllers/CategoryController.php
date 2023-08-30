<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }
    public function admin_index()
    {
        //
        $categories = Category::get();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create(Request $request)
    {

        $validated = $request->validate([
            'category_name' => 'required|max:50',
        ]);


        Category::create($validated);
        return redirect()->route('admin.category.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::find($id);
        $products = Product::where('category_id', $category->id)->get();

        return view('category.show', compact('category', 'products'));
    }

    public function admin_show($id)
    {
        //
        $category = Category::find($id);

        return view('admin.show_category', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //
    function update($id)
    {

        $category = Category::find($id);
        return view('admin.update_category', compact('category'));
    }
    public function edit($id, Request $request)
    {

        $category = Category::find($id);

        // Validate the request data
        $validated = $request->validate([
            'category_name' => 'required|max:40'
        ]);

        $category->update($validated);

        return redirect()->route('admin.show_category', $category->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category.index');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $categories = Category::where('category_name', 'LIKE', '%' . $query . '%')->get();

        return view('category.index', compact('categories'));
    }
}