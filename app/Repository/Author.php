<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Model;
//use App\Repository\Book;
class Author extends Model
{
    protected $table = 'authors';
    protected $guarded = [''];
    public $timestamps = false;
    
    public function book()
    {
        return $this->belongsToMany('App\Repository\Book', 'book_authors');
    }
}