<?php

namespace Shards\Http\Controllers\UserController;

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
        $this->middleware('Authenticate');
    }

    public function dashboard() {
        // Shows the users dashboard
    }

}
