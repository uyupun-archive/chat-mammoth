<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller {

    public function status404() {
        return view('errors.404');
    }
}
