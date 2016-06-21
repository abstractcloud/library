<?php

namespace App\Models;
use App\Entity\BookAuthor;

class BookAuthorModel
{
    public function insertAllData($authors, $bookId)
    {
        $data = [];
        if(is_array($authors)){
            foreach($authors as $author){
                $data['author_id'] = $author['id'];
                $data['book_id'] = $bookId;
                BookAuthor::insert($data);
            }
        }
    }
}
