<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {
        // Only authenticated users have access to this controller's methods
        $this->middleware('auth');
        // Checks if user is authorized for the action
        $this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return  view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|regex:/^\d{1,6}(\.\d{1,2})?$/' // Regex: up to 6 numbers before decimal seperator (.), up to two numbers after
        ];
        $request->validate($rules);

        $product = new Product();
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products_info', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|max:255',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|regex:/^\d{1,6}(\.\d{1,2})?$/' // Regex: up to 6 numbers before decimal seperator (.), up to two numbers after
        ];
        $request->validate($rules);

        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
