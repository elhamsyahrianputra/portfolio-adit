<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard.index', [
            'title' => '',
        ]);
    }

    public function settings() {
        return view('admin.dashboard.settings',[
            'title' => '',
        ]);
    }
}
 