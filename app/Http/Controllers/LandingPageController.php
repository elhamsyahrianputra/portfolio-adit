<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        return view('landing-page.index');
    }

    public function portfolio() {
        return view('landing-page.portfolio');
    }
}
