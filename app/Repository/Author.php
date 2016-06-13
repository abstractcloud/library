<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $guarded = [''];
    public $timestamps = false;
}