<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     /**
     * Get the comments for the blog post.
     */
    public function BookCart()
    {
        return $this->hasMany('App\BookCart');
    }

     /**
     * Get the comments for the blog post.
     */
    public function OrderedBook()
    {
        return $this->hasMany('App\OrderedBook');
    }
}
