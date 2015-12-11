@extends('layouts.master')

@section('title', 'User Dashboard')

@section('content')

    @include('users.userbar')

    <div class="container character-creation-container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Super basic placeholder character creation...</h1>

                {!! Form::open(array('url' => 'character', 'method' => 'post')) !!}

                {!! Form::text('name', null, array('placeholder' => 'Character Name')) !!}

                <hr/>

                {!! Form::label('race_id', 'Race') !!}

                {!! Form::select('race_id', $races, null, ['id' => 'race', 'placeholder' => 'Pick a race...']); !!}

                <div id="race-description"></div>

                <hr/>

                {!! Form::label('job_id', 'Job') !!}

                {!! Form::select('job_id', $jobs, null, ['id' => 'job', 'placeholder' => 'Pick a job...']); !!}

                <div id="job-description"></div>

                <hr/>

                <h3>Stats</h3>

                <p>
                    Based on your race and job, these will be your starting stats:
                </p>

                <table id="attribute-table" class="table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                Race: <span id="race-name"></span>
                            </th>
                            <th>
                                Job: <span id="job-name"></span>
                            </th>
                            <th>
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <hr/>

                {!! Form::submit('Save') !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop
