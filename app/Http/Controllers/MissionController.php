<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use Shards\Http\Requests;
use Shards\Http\Controllers\Controller;

use Session;

use Shards\Mission;
use Shards\MissionSpawn;

class MissionController extends Controller
{

    public function __construct() {
        // We want authentication on by default for this controller
        $this->middleware('auth');
    }


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
        return view('missions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Saving our mission...

        $mission = new Mission;

        $mission->name = $request->name;
        $mission->description = $request->description;
        $mission->level = $request->level;
        $mission->cost = $request->cost;


        if($mission->save()) {
            Session::flash('alert-success', 'Mission created');

            // Create some spawns

            $spawns = $request->spawns;

            foreach($spawns as $spawn) {

                $mission_spawn = new MissionSpawn;

                $mission_spawn->mission_id = $mission->id;
                $mission_spawn->spawn_id = $spawn['id'];
                $mission_spawn->chance = $spawn['chance'];

                $mission_spawn->save();

            }

            return back(); // TODO: Send them to the spawn list instead
        } else {
            Session::flash('alert-error', 'Could not create mission');
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
