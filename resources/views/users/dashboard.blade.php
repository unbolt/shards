@extends('layouts.master')

@section('title', 'User Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="/cache/avatars-small/{{ $user->activeCharacter->name }}.jpg" />
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $user->activeCharacter->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-sm-3 resource">
                                    <div class="resource-label">Energy</div>
                                    <h4>{{ $user->activeCharacter->energy }}</h4>
                                </div>
                                <div class="col-sm-3 resource">
                                    <div class="resource-label">Shards</div>
                                    <h4>26</h4>
                                </div>
                                <div class="col-sm-3 resource">
                                    <div class="resource-label">Gold</div>
                                    <h4>1,250</h4>
                                </div>
                                <div class="col-sm-3 resource">
                                    <div class="resource-label">Currency X</div>
                                    <h4>24,600</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <h3>Missions</h3>

                <div class="panel">
                    Select missions
                </div>

                <h3>Activity Feed</h3>

                <div class="panel">
                    Activity feed...
                </div>
            </div>
            <div class="col-md-5">

                <h3>Equipment</h3>

                <div class="panel">
                    Some kind of useful equipment setup here
                </div>

                <h3>Inventory <small>3/50</small></h3>

                <div class="panel">
                    Inventory view
                </div>
            </div>
        </div>
    </div>
@stop
