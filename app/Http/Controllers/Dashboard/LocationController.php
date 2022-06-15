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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = location::paginate(10);
        return view('dashboard.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $location = new Location();

        echo view('dashboard.location.create', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        Location::create($request->validated());

        return to_route("location.index")->with('status', "Localización creado.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
        return view("dashboard.location.show", compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {

        //dd($categories);

        echo view('dashboard.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Location $location)
    {

        $location->update($request->validated());

        return to_route("location.index")->with('status', "Registro actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
        //echo "Destroy";
        $location->delete();

        return to_route("location.index")->with('status', "Registro eliminado.");
    }
}
