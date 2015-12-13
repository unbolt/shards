@extends('layouts.master')

@section('title', 'Armour Listing')

@section('content')

    @include('users.userbar')

    <div class="container">
        <table class="table table-hover item-table" width="100%">
            <thead>
                <tr>
                    <th>

                    </th>
                    <th class="item-name">
                        Name
                    </th>
                    <th>
                        Slot
                    </th>
                    <th>
                        Level
                    </th>
                    <th>
                        Defense
                    </th>
                    <th>
                        Agility
                    </th>
                    <th>
                        Dexterity
                    </th>
                    <th>
                        Strength
                    </th>
                    <th>
                        Mind
                    </th>
                    <th>
                        Intelligence
                    </th>
                    <th>
                        Charisma
                    </th>

                </tr>
            </thead>

            <tbody>
                @foreach ($armour as $item)
                    <tr>
                        <td>
                            <div class="item-icon" data-icon="{{ $item->icon }}"></div>
                        </td>
                        <td class="item-name">
                            <a href="/item/{{ $item->id }}" class="quality-{{ $item->quality_id }}">{{ $item->name }}</a>
                        </td>
                        <td>
                            <span class="item-slot" data-slot-id="{{ $item->armour_slot_id }}"></span>
                        </td>
                        <td>
                            {{ $item->level }}
                        </td>
                        <td>
                            {{ $item->defense }}
                        </td>
                        <td>
                            {{ $item->agility }}
                        </td>
                        <td>
                            {{ $item->dexterity }}
                        </td>
                        <td>
                            {{ $item->strength }}
                        </td>
                        <td>
                            {{ $item->mind }}
                        </td>
                        <td>
                            {{ $item->intelligence }}
                        </td>
                        <td>
                            {{ $item->charisma }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @stop
