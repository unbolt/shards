@extends('layouts.master')

@section('title', 'Characters')

@section('content')

    <div class="container character-selection">
        <div class="row">
            <div class="col-md-12">
                <div class="character-container">
                    @foreach ($characters as $character)
                        <div class="character">
                            <h3>{{ $character->name }}</h3>

                            <div class="portrait"></div>

                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    {{ $character->race->name }}
                                </div>
                                <div class="col-sm-6 text-right">
                                    {{ $character->job->name }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="/character/create" class="btn btn-lg">Create Character</a>
            </div>
        </div>
    </div>
    @stop
