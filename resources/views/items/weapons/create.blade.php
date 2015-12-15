@extends('layouts.master')

@section('title', 'Create Weapon')

@section('content')

    @include('users.userbar')

    <div class="container armour-creation-container">
        <div class="row">
            <div class="col-md-6">
                <h1>Super basic placeholder weapon creation...</h1>

                {!! Form::open(array('url' => 'weapon', 'method' => 'post')) !!}

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 item-level">
                        </div>
                        <div class="col-sm-6">
                            {!! Form::text('attack', null, array('placeholder' => 'attack', 'class' => 'form-control', 'type' => 'number')) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::text('name', null, array('placeholder' => 'Armour Name', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('description', null, array('placeholder' => 'Description / Flavour Text', 'class' => 'form-control', 'rows' => '3')) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('quality_id', $qualities, null, ['placeholder' => 'Choose Quality', 'class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::select('weapon_type_id', $types, null, ['placeholder' => 'Choose Type', 'class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    <div class="icon-selection">
                        {!! Form::hidden('icon') !!}
                        @foreach($icons as $icon)
                            <div data-icon="{{ $icon }}"></div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <div class="stat-selection">

                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Save') !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-6">
                <div class="display-tooltip">

                </div>
            </div>
        </div>
    </div>
    @stop
