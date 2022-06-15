<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\PutRequest;
use App\Http\Requests\Location\StoreRequest;

class LocationController extends Controller
{

    public function index()
    {
        //
        return response()->json(Location::paginate(10));
    }

    public function all()
    {
        //
        return response()->json(Location::get());
    }

    public function store(StoreRequest $request)
    {
        //
        return response()->json(Location::create($request->validated()));
    }


    public function show(Location $location)
    {
        //
        return response()->json($location);
    }


    public function edit(Location $location)
    {
        //
    }


    public function update(PutRequest $request, Location $location)
    {
        //
        $location->update($request->validated());
        return response()->json($location);
    }


    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json("ok");
    }

    public function product(Location $location)
    {
        // $products = Product::join('locations', "locations.id", "=", "products.location_id")
        //     ->select("products.*", "locations.city as location")
        //     ->where("locations.id", $location->id)
        //     ->get();
        //->toSQL();

        $products = Product::with("location")
            ->where("location_id", $location->id)
            ->get();

        return response()->json($products);
    }

    public function city($city)
    {
        $location = Product::where("city", $city)->firtsOrFail();
        return response()->json($location);
    }
}
