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
}
