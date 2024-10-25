<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function agent()
    {
        return view('dashboard_agent');
    }

    public function client()
    {
        return view('welcome');
    }

    public function distributeur()
    {
        return view('dashboard_distributeur');
    }
}