@extends('layouts.master')

@section('title', 'User Registration')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register">
        {!! csrf_field() !!}
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-right">
                    Name
                </div>
                <div class="col-md-4">
                    <input type="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="col-md-4">
                    This is your friendly name, no one will ever see your email address.
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-right">
                    Email
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-right">
                    Password
                </div>
                <div class="col-md-4">
                    <input type="password" name="password">
                </div>
                <div class="col-md-4">
                    <input type="password" name="password_confirmation">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit">Register</button>
                </div>
            </div>
        </div>
    </form>
@stop
