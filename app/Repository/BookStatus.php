<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    protected $table = 'book_status';
    protected $guarded = [''];
    public $timestamps = false;
}
