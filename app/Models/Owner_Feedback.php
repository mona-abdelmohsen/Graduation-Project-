<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner_Feedback extends Model
{
    use HasFactory;
    protected $fillable=[
        'star_rating',
        'user_id'
    ];
   
}
