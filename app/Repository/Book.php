<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Model;
//use App\Repository\Author;
class Book extends Model
{
    protected $table = 'books';
    protected $guarded = [''];
    public $timestamps = false;
    
    public function author()
    {
        return $this->belongsToMany('App\Repository\Author', 'book_authors');
    }
}
