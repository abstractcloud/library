<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class BooksController extends Controller
{
    public function index()
    {
        return view('books.index');
    }
    
    public function create()
    {
        return view('books.create');
    }
}
