<?php

namespace App\Factories;
use App\Models\BookModel;
use App\Models\AuthorModel;

class TopFactory
{
    public function factoryMethod($type)
    {
        switch($type){
            case 'book': return new BookModel();
            break;
                
            case 'author': return new AuthorModel();
            break;
        }
    }
}
