<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Email','Parentname','Password',
    ];
    public $timestamps = false;
    protected $table = 'parents';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
    ];
}
