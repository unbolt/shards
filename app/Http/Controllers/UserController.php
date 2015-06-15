<?php

namespace Shards\Http\Controllers;

use Shards\Http\Controllers\Controller;

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

        return view('users.dashboard');
    }

}
