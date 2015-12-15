<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use File;

use Shards\Http\Requests;
use Shards\Http\Controllers\Controller;

use Shards\Weapon;
use Shards\WeaponType;
use Shards\ItemQuality;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weapons = Weapon::orderBy('level', 'asc')->paginate(20);

        return view('items.weapons.index')
                ->with('weapons', $weapons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the item qualities
        $qualities = ItemQuality::lists('name', 'id');

        // Get the armour types
        $types = WeaponType::lists('name', 'id');

        // Get the list of icons (this is quite large, might need a cleaner way of doing this in future?)
        $iconpath = base_path('public/assets/icons');
        $icons = array_map( 'basename', File::files( $iconpath ));

        return view('items.weapons.create')
                ->with('qualities', $qualities)
                ->with('types', $types)
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
        $weapon = new Weapon;

        $weapon->name = $request->name;
        $weapon->description = $request->description;
        $weapon->level = $request->level;
        $weapon->attack = $request->attack;

        $weapon->quality_id = $request->quality_id;
        $weapon->weapon_type_id = $request->weapon_type_id;

        $weapon->icon = $request->icon;

        $weapon->agility = $request->agility;
        $weapon->dexterity = $request->dexterity;
        $weapon->strength = $request->strength;
        $weapon->mind = $request->mind;
        $weapon->intelligence = $request->intelligence;
        $weapon->charisma = $request->charisma;

        $weapon->save();
    }

    public function search($term) {
        $weapon = Weapon::where('name', 'LIKE', '%'.$term.'%')->get();

        return $weapon;
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
