@extends('layouts.master')

@section('title', 'Create Mission')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Super basic placeholder mission creation...</h1>

                {!! Form::open(array('url' => 'mission', 'method' => 'post')) !!}

                <div class="form-group">
                    {!! Form::text('name', null, array('placeholder' => 'Mission Name', 'class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::textarea('description', null, array('placeholder' => 'Description', 'class' => 'form-control', 'rows' => '3')) !!}
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::text('level', null, array('placeholder' => 'Level', 'class' => 'form-control')) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('cost', null, array('placeholder' => 'Cost', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>

                <h2>Monsters</h2>
                <p>
                    Select which monsters you want people to have a chance of facing during this mission. These will be randomly selected between.
                </p>

                <div class="form-group">
                    {!! Form::text('spawn_search', null, array('placeholder' => 'Search for spawns...', 'class' => 'form-control typeahead-spawns')) !!}
                </div>

                <div class="form-group">
                    <div class="spawn-list">

                    </div>
                </div>

                {!! Form::submit('Save') !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop
