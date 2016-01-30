<?php

namespace Shards\Http\Controllers;

use Shards\Http\Controllers\Controller;

use Auth;

use Shards\User;
use Shards\Character;


class UserController extends Controller {

    /*****
     *
     *  USER CONTROLLER
     *
     *  Does everything user related. Nice.
     *
     *
     *****/

    public function __construct() {
        // We want authentication on by default for this controller
        $this->middleware('auth');
    }

    public function dashboard() {
        // Shows the users dashboard

        // Get the user to display, that's this one
        $user = Auth::user();

        return view('users.dashboard')
                ->withUser($user);
    }

}
