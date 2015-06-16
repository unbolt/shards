@extends('layouts.master')

@section('title', 'Login')
@section('body_class', 'login')

@section('content')

<div class="container login">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form method="POST" action="/login">
                {!! csrf_field() !!}
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" class="form-control" tabindex="1" autocomplete="off" autocorrect="off" spellcheck="false">
                </div>

                <div>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" tabindex="2" autocomplete="off" autocorrect="off" spellcheck="false">
                </div>

                <div>
                    <input type="checkbox" name="remember"> Keep me logged in
                </div>

                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
