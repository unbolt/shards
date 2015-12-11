@extends('layouts.master')

@section('title', 'Create Race')

@section('content')

    @include('users.userbar')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Super basic placeholder race creation...</h1>

                {!! Form::open(array('url' => 'race', 'method' => 'post')) !!}

                {!! Form::text('name', null, array('placeholder' => 'Race Name')) !!}

                <h2>Bonus Stats</h2>

                {!! Form::label('agility', 'Agility') !!}

                {!! Form::selectRange('agility', 0, 3) !!}

                {!! Form::label('dexterity', 'Dexterity') !!}

                {!! Form::selectRange('dexterity', 0, 3) !!}

                {!! Form::label('strength', 'Strength') !!}

                {!! Form::selectRange('strength', 0, 3) !!}

                {!! Form::label('mind', 'Mind') !!}

                {!! Form::selectRange('mind', 0, 3) !!}

                {!! Form::label('intelligence', 'Intelligence') !!}

                {!! Form::selectRange('intelligence', 0, 3) !!}

                {!! Form::label('charisma', 'Charisma') !!}

                {!! Form::selectRange('charisma', 0, 3) !!}

                {!! Form::submit('Save') !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop
