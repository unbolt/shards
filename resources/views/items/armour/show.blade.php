@extends('layouts.master')

@section('title', 'Armour')

@section('content')

    <div class="container armour-container">
        <div class="row">
            <div class="col-md-12">
                {{ $armour->name }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Acquisition</h3>

                <table class="table" width="100%">
                    <thead>
                        <th>
                            Monster Name
                        </th>
                        <th>
                            Drop Chance
                        </th>
                        <th>
                            Zone
                        </th>
                        <th>
                            Area
                        </th>
                    </thead>
                        @foreach ($armour->droppedBy as $drop)
                            <tr>
                                <td>
                                    {{ $drop->spawn->name }}
                                </td>
                                <td>
                                    {{ $drop->chance }}%
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    @stop
