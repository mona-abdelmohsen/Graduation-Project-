<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture_path',
        'post_id'
    ];
    
    
    public function posts(){
        return $this->belongsTo(post::class,'post_id');
    }
    
}
