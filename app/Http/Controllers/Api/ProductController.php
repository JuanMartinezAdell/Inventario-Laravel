<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\PutRequest;
use App\Http\Requests\Product\StoreRequest;

class ProductController extends Controller
{

    public function index()
    {
        //
        return response()->json(Product::paginate(10));
    }

    public function all()
    {
        //
        return response()->json(Product::get());
    }

    public function store(StoreRequest $request)
    {
        //
        return response()->json(Product::create($request->validated()));
    }

    public function code(Product $product)
    {
        $product->location;
        return response()->json($product);
    }

    public function show(Product $product)
    {
        //
        return response()->json($product);
    }


    public function update(PutRequest $request, Product $product)
    {
        //
        $product->update($request->validated());
        return response()->json($product);
    }


    public function destroy(Product $product)
    {
        //
        $product->delete();
        return response()->json("ok");
    }
}
