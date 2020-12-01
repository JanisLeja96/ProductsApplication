<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOption;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
            'deliveryOptions' => DeliveryOption::all()
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        $product->save();
        return redirect(route('products.show', $product));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->only(['name', 'count', 'size']));
        $product->price = $request['price'] * 100;
        $product->save();

        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        if ($product->exists) {
            $product->delete();
            return redirect(route('products.index'));
        }
        return abort(404);
    }
}
