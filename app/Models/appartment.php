<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact',
        'type',
        'room_num',
        'location',
        'branch_id',
        'region_id',
        'user_id',
        'price',
        'status'

    ];

    public function User()
    {
        return $this->belongsTo(post::class);
    }
    public function Region(){
        return $this->belongsTo(region::class,'region_id');
    }
    public function Branch(){
        return $this->belongsTo(branch::class,'branch_id');
    }
    public function Post(){
        return $this->hasMany(post::class);
    }
}
