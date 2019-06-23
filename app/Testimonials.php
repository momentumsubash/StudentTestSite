<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    //
    protected $fillable = [
        'person_name', 'title', 'email','address','message','profile_image','star'
    ];

}
