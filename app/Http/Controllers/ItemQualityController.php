<?php

namespace Shards\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Shards\Http\Requests;
use Shards\Http\Requests\StoreItemQualityRequest;
use Shards\Http\Controllers\Controller;

use Shards\ItemQuality;

class ItemQualityController extends Controller
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
        // Create a new item quality
        return view('items.quality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemQualityRequest $request)
    {
        // Save item quality
        $quality = new ItemQuality;

        $quality->name = $request->name;

        if($quality->save()) {
            Session::flash('alert-success', 'Item quality created');
            return back(); // TODO: Send them to the item list instead
        } else {
            Session::flash('alert-error', 'Could not create item quality');
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
