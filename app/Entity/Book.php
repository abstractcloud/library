<?php

namespace App\Entity;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $guarded = [''];
    public $timestamps = false;
    
    public function author()
    {
        return $this->belongsToMany('App\Entity\Author', 'book_authors');
    }
}
