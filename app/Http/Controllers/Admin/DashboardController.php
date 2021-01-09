<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * show Panel Admin (Dashboard)
     *
     * @return void
     */
    public function __invoke()
    {
        return view('layouts.panel');
    }
}
