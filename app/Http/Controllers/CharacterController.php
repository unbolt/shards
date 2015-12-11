<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Shards\Http\Requests;
use Shards\Http\Requests\StoreCharacterRequest;
use Shards\Http\Controllers\Controller;

use Shards\Character;
use Shards\Job;
use Shards\Race;


class CharacterController extends Controller
{

    public function __construct() {
        // We want authentication on by default for this controller
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new character.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // CREATE A NEW CHARACTER!

        // Get list of races
        $races = Race::lists('name', 'id');

        // Get list of jobs
        $jobs = Job::lists('name', 'id');

        return view('characters.create')
                ->with('races', $races)
                ->with('jobs', $jobs);
    }

    /**
     * Store a newly created character.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacterRequest $request)
    {
        // Save a character
        $character = new Character;

        $character->user_id = Auth::user()->id;
        $character->name = $request->name;
        $character->race_id = $request->race_id;
        $character->job_id = $request->job_id;
        $character->experience = 1;
        $character->level = 1;

        if($character->save()) {
            Session::flash('alert-success', 'Character created');
            return back(); // TODO: Send them to the character list instead
        } else {
            Session::flash('alert-error', 'Could not create character');
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
