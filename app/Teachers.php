<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Email','TeacherName','Password',
    ];
    public $timestamps = false;
    protected $table = 'teachers';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
    ];
}
