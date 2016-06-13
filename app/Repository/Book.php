<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $guarded = [''];
    public $timestamps = false;
}
