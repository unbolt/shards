<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Shards\Http\Requests;
use Shards\Http\Requests\StoreRaceRequest;
use Shards\Http\Controllers\Controller;

use Shards\Race;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display form to create a new race
        return view('races.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRaceRequest $request)
    {
        $race = new Race;

        $race->name = $request->name;
        $race->description = $request->description;
        $race->agility = $request->agility;
        $race->dexterity = $request->dexterity;
        $race->strength = $request->strength;
        $race->mind = $request->mind;
        $race->intelligence = $request->intelligence;
        $race->charisma = $request->charisma;

        if($race->save()) {
            Session::flash('alert-success', 'Race created');
            return back(); // TODO: Send them to the race list instead
        } else {
            Session::flash('alert-error', 'Could not create race');
            return back();
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
