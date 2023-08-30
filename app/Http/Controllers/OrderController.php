<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('profile.mycart', compact('orders'));
    }
    public function admin_index()
    {
        $orders = Order::get();

        return view('admin.order', compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        Order::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->input('product_id'),
            'price' => $request->input('quantity') * $request->input('product_price'),
        ]);
        $products = Product::find($request->input('product_id'));
        echo '<h2>The order added successfully</h2>';
        return view('product.show_product', compact('products'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function admin_show($id)
    {
        $order = Order::find($id);
        return view('admin.show_order', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $order = Order::find($id);

        // Validate the request data
        $validated = $request->validate([
            'price' => 'required|numeric',
        ]);

        $order->update($validated);

        return redirect()->route('admin.show_order', $order->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    function update($id)
    {

        $order = Order::find($id);
        return view('admin.update_order', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->delete();
        return redirect()->route('admin.order.index');
    }
    public function search(Request $request)
    {
        $query = $request->input('id');
        $orders = Order::where('user_id', $query)->get();
        return view('admin.order', compact('orders'));
    }
}