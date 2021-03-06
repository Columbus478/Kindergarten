<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Email','SchoolName','Password',
    ];
    public $timestamps = false;
    protected $table = 'schools';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
    ];
}
