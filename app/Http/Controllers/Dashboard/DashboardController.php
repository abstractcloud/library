<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}