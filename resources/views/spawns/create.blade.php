@extends('layouts.master')

@section('title', 'Create Spawn')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Super basic placeholder spawn creation...</h1>

                {!! Form::open(array('url' => 'spawn', 'method' => 'post')) !!}

                <div class="form-group">
                    {!! Form::text('name', null, array('placeholder' => 'Spawn Name', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('monster', $monsters, null, array('placeholder' => 'Select Type', 'class' => 'form-control')) !!}
                </div>

                <hr/>

                <h3>Add Drops</h3>

                <div class="form-group">
                    {!! Form::text('item_search', null, array('placeholder' => 'Search for items...', 'class' => 'form-control typeahead-items')) !!}
                </div>

                <div class="form-group">
                    <div class="drop-list">

                    </div>
                </div>

                {!! Form::submit('Save') !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop
