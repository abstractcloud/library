<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $table = 'book_author';
    protected $guarded = [''];
    public $timestamps = false;
}
