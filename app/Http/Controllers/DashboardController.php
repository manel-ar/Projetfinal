<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        return view('dashboard');
    }
    public function  acceuil()
    {
        return view('acceuil');
    }
}
