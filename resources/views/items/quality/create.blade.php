@extends('layouts.master')

@section('title', 'Create Item Quality')

@section('content')

    @include('users.userbar')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Super basic placeholder item quality creation...</h1>

                {!! Form::open(array('url' => 'itemquality', 'method' => 'post')) !!}

                {!! Form::text('name', null, array('placeholder' => 'Quality Name')) !!}

                {!! Form::submit('Save') !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop
