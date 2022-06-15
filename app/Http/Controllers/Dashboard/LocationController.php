<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Location;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\PutRequest;
use App\Http\Requests\Location\StoreRequest;
use Illuminate\Support\Facades\Validator;


class LocationController extends Controller
{

    public function index()
    {
        $locations = location::paginate(10);
        return view('dashboard.location.index', compact('locations'));
    }


    public function store(StoreRequest $request)
    {

        Location::create($request->validated());

        return to_route("location.index")->with('status', "Localización creado.");
    }


    public function show(Location $location)
    {
        //
        return view("dashboard.location.show", compact('location'));
    }


    public function update(PutRequest $request, Location $location)
    {

        $location->update($request->validated());

        return to_route("location.index")->with('status', "Registro actualizado.");
    }


    public function destroy(Location $location)
    {
        //
        //echo "Destroy";
        $location->delete();

        return to_route("location.index")->with('status', "Registro eliminado.");
    }
}
