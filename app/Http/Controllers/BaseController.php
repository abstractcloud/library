<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Book;
use App\Http\Requests;

class BaseController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('base.index', [
            'books' => $books
        ]);
    }
}
