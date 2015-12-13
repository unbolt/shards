<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Session;
use Shards\Http\Requests;
use Shards\Http\Requests\StoreArmourRequest;
use Shards\Http\Controllers\Controller;

use Shards\Armour;
use Shards\ItemQuality;
use Shards\ArmourType;
use Shards\ArmourSlot;

class ArmourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get armour listing
        $armour = Armour::orderBy('level', 'asc')->paginate(20);

        return view('items.armour.index')
                ->with('armour', $armour);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a new piece of armour

        // Get the item qualities
        $qualities = ItemQuality::lists('name', 'id');

        // Get the armour types
        $types = ArmourType::lists('name', 'id');

        // Get the armour slots
        $slots = ArmourSlot::lists('name', 'id');

        // Get the list of icons (this is quite large, might need a cleaner way of doing this in future?)
        $iconpath = base_path('public/assets/icons');
        $icons = array_map( 'basename', File::files( $iconpath ));

        return view('items.armour.create')
                ->with('qualities', $qualities)
                ->with('types', $types)
                ->with('slots', $slots)
                ->with('icons', $icons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $armour = new Armour;

        $armour->name = $request->name;
        $armour->description = $request->description;
        $armour->level = $request->level;
        $armour->defense = $request->defense;

        $armour->quality_id = $request->quality_id;
        $armour->armour_type_id = $request->armour_type_id;
        $armour->armour_slot_id = $request->armour_slot_id;

        $armour->icon = $request->icon;

        $armour->agility = $request->agility;
        $armour->dexterity = $request->dexterity;
        $armour->strength = $request->strength;
        $armour->mind = $request->mind;
        $armour->intelligence = $request->intelligence;
        $armour->charisma = $request->charisma;

        $armour->save();


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
