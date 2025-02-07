<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{  

   protected $fillable = ['title', 'content', 'slug', 'status'];
   
   public function user()
   {
   	return $this->belongsTo('App\User');
   }
}
