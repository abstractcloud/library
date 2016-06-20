<?php

namespace App\Models;
use DB;
use App\Entity\Author;
use App\Repository\BookAuthor;
use App\Contracts\TopInterface;
use App\Factories\TopFactory;

use Carbon\Carbon;

class AuthorModel implements TopInterface
{
    public function top($period)
    {
        $query = DB::table('book_transaction')
            ->join('book_authors', 'book_authors.book_id', '=', 'book_transaction.book_id')
            ->join('authors', 'authors.id', '=', 'book_authors.author_id')
            ->selectRaw('authors.id, authors.author, book_transaction.date, count(authors.id) as count');
        
        switch($period){
            case 'year' : $subPeriod = Carbon::now()->subYear();
            break;
            
            case 'month' : $subPeriod = Carbon::now()->subMonth();
            break;
                
            case 'week' : $subPeriod = Carbon::now()->subWeek();
            break;
        }
        
        if(!empty($period)){
            $query->whereRaw('book_transaction.date >= ?', [
                $subPeriod
            ]);
        }
        
        $query->groupBy('authors.author')
            ->orderBy('count', 'desc')
            ->limit(10);
        $list = $query->get();
        
        return $list;
    }
}