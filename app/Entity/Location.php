<?php

namespace App\Entity;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $guarded = [''];
    public $timestamps = false;
}