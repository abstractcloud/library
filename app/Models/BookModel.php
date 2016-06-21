<?php

namespace App\Models;
use DB;
use App\Entity\Book;
use App\Entity\Author;
use App\Entity\BookAuthor;
use App\Contracts\TopInterface;
use App\Factories\TopFactory;

use Carbon\Carbon;

class BookModel implements TopInterface
{
    public function getAllBooks($params = [])
    {
        $booksWithAuthors = [];
        
        $books = DB::table('books')
            ->join('book_status', 'books.book_status_id', '=', 'book_status.id')
            ->join('location', 'books.location_id', '=', 'location.id')
            ->select(
                'books.*', 
                'location.hall', 
                'location.shelving', 
                'location.bookshelf', 
                'location.position', 
                'book_status.status'
            );
        
        if(!empty($params['hall'])){
            $books->where('location.hall', '=', $params['hall']);
        }
        
        if(!empty($params['shelving'])){
            $books->where('location.shelving', '=', $params['shelving']);
        }
        
        if(!empty($params['bookshelf'])){
            $books->where('location.bookshelf', '=', $params['bookshelf']);
        }
        
        if(!empty($params['position'])){
            $books->where('location.position', '=', $params['position']);
        }
        
        if(!empty($params['datestart']) && !empty($params['dateend'])){
            $books->whereRaw('books.date >= ? AND books.date <= ?', [$params['datestart'], $params['dateend']]);
        }
        
        $list = $books->get();
        
        foreach($list as $k => $book){
            $authors = Book::find($book->id)->author;
            $book->authors = $authors;
            
        }
        
        return $list;
    }
    
    public function top($period)
    {
        $subPeriod = '';
        $top = DB::table('book_transaction')
            ->join('books','books.id', '=', 'book_transaction.book_id')
            ->select('books.name', 'books.id', 'book_transaction.date', DB::raw('count(books.id) as count'));
        
        
         switch($period){
            case 'year' : $subPeriod = Carbon::now()->subYear();
            break;
            
            case 'month' : $subPeriod = Carbon::now()->subMonth();
            break;
                
            case 'week' : $subPeriod = Carbon::now()->subWeek();
            break;
        }
        
        if(!empty($period)){
            $top->whereRaw('book_transaction.date >= ?', [
                $subPeriod
            ]);
        }
        
        $top->groupBy('books.name')
            ->orderBy('count', 'desc')
            ->limit(10);
        $list = $top->get();
        return $list;
        
    }
}