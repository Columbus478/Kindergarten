<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diaries extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       
    ];
    public $timestamps = false;
    protected $table = 'diaries';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
