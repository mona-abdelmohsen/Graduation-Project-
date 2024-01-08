<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;
    protected $fillable=[
        'comments',
        'user_id',
        'star_rating',
    ];
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
