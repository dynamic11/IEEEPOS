<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
   protected $table = 'timetable';
   public $timestamps = false;
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'volunteerID1', 'volunteerID2', 'volunteerID3',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       'day', 'shift_time',
   ];

   public function Volunteer(){
     return $this->hasMany('App\Volunteer');
   }
}
