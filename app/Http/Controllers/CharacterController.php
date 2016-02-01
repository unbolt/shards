<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Shards\Http\Requests;
use Shards\Http\Requests\StoreCharacterRequest;
use Shards\Http\Controllers\Controller;

use Shards\Character;
use Shards\CharacterMission;
use Shards\Job;
use Shards\Race;

class CharacterController extends Controller
{

    public function __construct() {
        // We want authentication on by default for this controller
        $this->middleware('auth');
    }

    public function index() {
        // Show character list
        $characters = Character::where('user_id', Auth::user()->id)->get();

        return view('characters.index')
                ->with('characters', $characters);
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
     * Check if the user is a on a mission or not
    */

    public function checkMissionStatus() {
        // Check if the character is on a mission or not and return

        // Get active character
        $character = Auth::user()->active_character_id;

        if($character) {
            $active_missions = CharacterMission::where('active', 1)
                                                ->where('character_id', $character)
                                                ->first();

            if($active_missions) {
                $return['mission_active'] = true;
            } else {
                $return['mission_active'] = false;
            }

            return $return;
        }
    }

    /**
    * Get the current mission information for a character
    */

    public function getCharacterMissionDetails() {
        // Get active character
        $character = Auth::user()->active_character_id;

        if($character) {
            $active_mission = CharacterMission::where('active', 1)
                                                ->where('character_id', $character)
                                                ->first();

            if($active_mission) {
                // Build the response
                $return['name'] = $active_mission->mission->name;
                $return['description'] = $active_mission->mission->description;
                $return['start_at'] = $active_mission->start_at;
                $return['finish_at'] = $active_mission->finish_at;
            }
        }

        return $return;
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
