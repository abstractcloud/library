<?php

namespace App\Http\Controllers\Api;
use App\Repository\Book;
use App\Repository\BookStatus;
use App\Repository\BookAuthor;
use App\Repository\Location;
use App\Models\BookAuthorModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class BookController extends Controller
{
    public function one($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }
    
    public function get()
    {
        $books = Book::all();
        return response()->json($books);
    }
    
    public function create(Request $request)
    {
        $params = $request->json()->all();
        $location = new Location();
        $obj = $location->create($params['location']);
        if($obj->id){
            
            $book = new Book();
            $bookAthorModel = new BookAuthorModel();
            $book->name = $params['name'];
            $book->description = $params['description'];
            $book->book_status_id = $params['book_status'];
            $book->location_id = $obj->id;
            $bookObj = $book->save();
            $bookAthorModel->insertAllData($params['authors'], $book->id);
        }
        
        return response()->json($params);
    }
    
    public function update(Request $request)
    {
        $params = $request->json()->all();
        $book = Book::find($params['id']);
        $book->save();
        
        return response()->json($params);
    }
    
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        
        $this->get();
    }
    
    public function status()
    {
        $status = BookStatus::all();
        return response()->json($status);
    }
    
}
