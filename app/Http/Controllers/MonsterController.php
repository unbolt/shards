<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Shards\Http\Requests;
use Shards\Http\Controllers\Controller;

use Shards\Monster;
use Shards\MonsterType;
use Shards\MonsterRank;

class MonsterController extends Controller
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

        // Get Monster types
        $types = MonsterType::lists('name', 'id');

        // Get Monster ranks
        $ranks = MonsterRank::lists('name', 'id');

        return view('monsters.create')
                ->with('ranks', $ranks)
                ->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $monster = new Monster;

        $monster->name = $request->name;
        $monster->monster_type_id = $request->monster_type;
        $monster->monster_rank_id = $request->monster_rank;

        if($monster->save()) {
            Session::flash('alert-success', 'Monster created');
            return back(); // TODO: Send them to the monster list instead
        } else {
            Session::flash('alert-error', 'Could not create monster');
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
