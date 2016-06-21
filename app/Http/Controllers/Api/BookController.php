<?php

namespace App\Http\Controllers\Api;
use Auth;
use App\Entity\Book;
use App\Entity\Author;
use App\Entity\BookStatus;
use App\Entity\BookAuthor;
use App\Entity\Location;
use App\Models\Upload;
use App\Models\BookAuthorModel;
use App\Models\BookModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class BookController extends Controller
{
    public function __construct()
    {
        if(!Auth::check()){
            return response()->json(false);
        }
    }
    
    public function one($id)
    {
        $book = Book::find($id);
        $location = Location::find($book->location_id);
        $authors = Book::find($id)->author;
        $book->location = $location;
        $book->authors = $authors;
        return response()->json($book);
    }
    
    public function get()
    {
        $books = new BookModel();
        $list = $books->getAllBooks();
        return response()->json($list);
    }
    
    public function create(Request $request)
    {
        $params = $request->json()->all();
        $location = new Location();
        $obj = $location->create($params['location']);
        
        if($obj->id){
            
            $upload = new Upload();
            $filename = $upload->uploadBase64Image($params['preview']);
            
            if($filename){
                $book = new Book();
                $bookAthorModel = new BookAuthorModel();
                $book->name = $params['name'];
                $book->description = $params['description'];
                $book->book_status_id = $params['book_status'];
                $book->location_id = $obj->id;
                $book->preview = $filename;
                $bookObj = $book->save();
                $bookAthorModel->insertAllData($params['authors'], $book->id);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'file not exist'
                ]);
            }
        }
        
        return response()->json($params);
    }
    
    public function update(Request $request)
    {
        $bookAthorModel = new BookAuthorModel();
        
        $params = $request->json()->all();
        
        $book = Book::find($params['id']);
        $book->name = $params['name'];
        $book->description = $params['description'];
        $book->book_status_id = $params['book_status_id'];
        
        $location = Location::find($book->location_id);
        $location->update($params['location']);
        
        if(!empty($params['preview'])){
            $upload = new Upload();
            $filename = $upload->uploadBase64Image($params['preview']);
            $book->preview = $filename;
        }
        
        $authors = BookAuthor::where('book_id', '=', $params['id'])->delete();
        $bookAthorModel->insertAllData($params['authors'], $book->id);
        
        $book->save();
        
        return response()->json($params);
    }
    
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        $books = Book::all();
        return response()->json($books);
    }
    
    public function deleteimage($link)
    {
        $book = Book::where('preview', '=', $link)->first();
        $book->preview = "";
        $book->save();
        
        $upload = new Upload();
        $filename = $upload->unlink($link);
    }
    
    public function status()
    {
        $status = BookStatus::all();
        return response()->json($status);
    }
    
}
