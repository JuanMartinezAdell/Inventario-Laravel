<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Product\StoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



        $products = Product::paginate(10);

        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locations = Location::pluck('id', 'name');
        $product = new Product();

        //$locations = Location::get();

        // echo view('dashboard.product.create', compact('location', 'product'));

        echo view('dashboard.product.create', compact('locations'));
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
        // Product::create($request->validated());

        // $validated = Validator::make($request->all(), StoreRequest::myRules());

        // dd($validated->fails());

        $data = array_merge($request->all());

        // dd($data);

        Product::create($data);

        //
        // echo "strore";
        return to_route("product.index")->with('status', "Producto creado.");

        return to_route("product.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view("dashboard.product.show", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //

        $locations = Location::pluck('id', 'name');
        echo view('dashboard.product.edit', compact('locations', 'product'));

        //return to_route("product.index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $data =  $request->validated();
        if (isset($data["image"])) {

            $data["image"] = $filename = time() . "." . $data["image"]->extension();

            $request->image->move(public_path("image"), $filename);
        }
        //
        $product->update($data);
        return to_route("product.index")->with('status', "Producto actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return to_route("product.index")->with('status', "Producto eliminado.");
    }
}
