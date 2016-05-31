<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedBook extends Model
{

    /**
     * Get the post that owns the comment.
     */
    public function Book()
    {
        return $this->belongsTo('App\Book');
    }
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orderedBooks';
}
