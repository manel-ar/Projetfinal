<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardMedecinController extends Controller
{
    public function getDashboardMedecin()
    {
        return view('dashboardMedecin');
    }
}
