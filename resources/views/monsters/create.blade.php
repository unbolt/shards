@extends('layouts.master')

@section('title', 'Create Monster')

@section('content')

    @include('users.userbar')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Super basic placeholder monster creation...</h1>

                {!! Form::open(array('url' => 'monster', 'method' => 'post')) !!}

                <div class="form-group">
                    {!! Form::text('name', null, array('placeholder' => 'Monster Name', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::select('monster_type', $types, null, array('placeholder' => 'Select Type', 'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::select('monster_rank', $ranks, null, array('placeholder' => 'Select Rank', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>

                {!! Form::submit('Save') !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop
