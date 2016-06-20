<?php

namespace App\Entity;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $table = 'book_authors';
    protected $guarded = [''];
    public $timestamps = false;
}
