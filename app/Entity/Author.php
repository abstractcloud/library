<?php

namespace App\Entity;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $guarded = [''];
    public $timestamps = false;
    
    public function book()
    {
        return $this->belongsToMany('App\Entity\Book', 'book_authors');
    }
}