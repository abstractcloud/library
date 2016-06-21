<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Http\Requests;

use App\Factories\TopFactory;

class BaseController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $period = $params['top'];
        $model = new BookModel();
        $books = $model->getAllBooks($params);
        
        $topFactory = new TopFactory();
        $topBooksFactory = $topFactory->factoryMethod('book');
        $topAuthorsFactory = $topFactory->factoryMethod('author');
        $topBooks = $topBooksFactory->top($period);
        $topAuthors = $topAuthorsFactory->top($period);
        return view('base.index', [
            'books' => $books,
            'topbooks' => $topBooks,
            'topauthors' => $topAuthors
            
        ]);
    }
    
}
