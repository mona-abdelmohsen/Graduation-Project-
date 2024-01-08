<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'appartment_id',
        'user_id',
        'region_id',
        'branch_id',
        'type'
    ];

   
    public function Appartment(){
        return $this->belongsTo(appartment::class,'appartment_id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
