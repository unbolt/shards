@extends('layouts.master')

@section('title', 'Spawn')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1> {{ $spawn->name }} </h1>

                <p>
                    Spawn information can appear here
                </p>

                <h3>Drops</h3>
                @foreach( $spawn->drops as $drop )
                    <div class="row drops">
                        <div class="col-sm-1">
                            <div class="item-icon" data-icon="{{$drop->droppable->icon}}" data-item-quality="{{$drop->droppable->quality_id}}" data-item-name="{{$drop->droppable->name}}" data-drop="{{$drop->droppable->type}}-{{$drop->droppable->id}}"></div>
                        </div>
                        <div class="col-sm-9 quality-{{$drop->droppable->quality_id}}">
                            {{ $drop->droppable->name }}
                        </div>
                        <div class="col-sm-2">
                            {{ $drop->chance }}%
                        </div>
                    </div>
                @endforeach

                <h3>Test Drops</h3>

                <input type="button" class="test-drops-button" data-spawn="{{$spawn->id}}" value="Run Test"></input>

                <div class="test-drops-results">

                </div>

                <div class="test-drops">

                </div>
            </div>
        </div>
    </div>
    @stop
