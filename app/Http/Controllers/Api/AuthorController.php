<?php

namespace App\Http\Controllers\Api;
use Auth;
use App\Entity\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AuthorController extends Controller
{
    public function __construct()
    {
        if(!Auth::check()){
            return response()->json(false);
        }
    }
    
    public function one($id)
    {
        $author = Author::find($id);
        return response()->json($author);
    }
    
    public function get()
    {
        $authors = Author::all();
        return response()->json($authors);
    }
    
    public function create(Request $request)
    {
        $params = $request->json()->all();
        $author = new Author();
        $author->create($params);
        
        return response()->json($params);
    }
    
    public function update(Request $request)
    {
        $params = $request->json()->all();
        $author = Author::find($params['id']);
        $author->author = $params['author'];
        $author->save();
        
        return response()->json($params);
    }
    
    public function delete($id)
    {
        $author = Author::find($id);
        $author->delete();
         $authors = Author::all();
        return response()->json($authors);
    }
    
}
