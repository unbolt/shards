<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Shards\Http\Requests;
use Shards\Http\Requests\StoreJobRequest;
use Shards\Http\Controllers\Controller;

use Shards\Job;

class JobController extends Controller
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
        // Display form to create a new job
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        // Save the job
        $job = new Job;

        $job->name = $request->name;
        $job->agility = $request->agility;
        $job->dexterity = $request->dexterity;
        $job->strength = $request->strength;
        $job->mind = $request->mind;
        $job->intelligence = $request->intelligence;
        $job->charisma = $request->charisma;

        if($job->save()) {
            Session::flash('alert-success', 'Job created');
            return back(); // TODO: Send them to the job list instead
        } else {
            Session::flash('alert-error', 'Could not create job');
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
        // Fetch job by ID  
        $job = Job::find($id);

        return $job;
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
