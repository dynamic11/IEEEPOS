<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
   protected $table = 'volunteers';
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'name', 'email'
   ];

}
