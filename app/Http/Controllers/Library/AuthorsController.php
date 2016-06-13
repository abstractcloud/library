<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AuthorsController extends Controller
{
    public function index()
    {
        
        return view('author.index');
    }
}
