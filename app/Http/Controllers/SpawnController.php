<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use Session;

use Shards\Http\Requests;
use Shards\Http\Controllers\Controller;

use Shards\Monster;
use Shards\Spawn;
use Shards\Drop;
use Shards\Armour;

class SpawnController extends Controller
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
        // Get monster list
        $monsters = Monster::lists('name', 'id');

        return view('spawns.create')
                ->with('monsters', $monsters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spawn = new Spawn;

        $spawn->name = $request->name;
        $spawn->monster_id = $request->monster;

        if($spawn->save()) {
            Session::flash('alert-success', 'Spawn created');

            // Create some drops

            $drops = $request->drops;

            foreach($drops as $drop) {

                switch ($drop['type']) {
                    case 'armour':
                        $item = Armour::where('id', $drop['id'])->first();
                        break;
                }

                $droppable = new Drop;
                $droppable->chance = $drop['chance'];
                $droppable->spawn_id = $spawn->id;
                $item->droppedBy()->save($droppable);

            }

            return back(); // TODO: Send them to the spawn list instead
        } else {
            Session::flash('alert-error', 'Could not create spawn');
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
