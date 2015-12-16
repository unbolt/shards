@extends('layouts.master')

@section('title', 'Create Job')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Super basic placeholder job creation...</h1>

                {!! Form::open(array('url' => 'job', 'method' => 'post')) !!}

                {!! Form::text('name', null, array('placeholder' => 'Job Name')) !!}

                {!! Form::label('agility', 'Agility') !!}

                {!! Form::selectRange('agility', 1, 9) !!}

                {!! Form::label('dexterity', 'Dexterity') !!}

                {!! Form::selectRange('dexterity', 1, 9) !!}

                {!! Form::label('strength', 'Strength') !!}

                {!! Form::selectRange('strength', 1, 9) !!}

                {!! Form::label('mind', 'Mind') !!}

                {!! Form::selectRange('mind', 1, 9) !!}

                {!! Form::label('intelligence', 'Intelligence') !!}

                {!! Form::selectRange('intelligence', 1, 9) !!}

                {!! Form::label('charisma', 'Charisma') !!}

                {!! Form::selectRange('charisma', 1, 9) !!}

                {!! Form::submit('Save') !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop
