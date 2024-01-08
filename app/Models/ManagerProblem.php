<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerProblem extends Model
{
    use HasFactory;
    protected $fillable=[
        'content' ,
        'user_id' ,
        'branch_id' ,
    ];
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
