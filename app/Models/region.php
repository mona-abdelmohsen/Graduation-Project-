<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch_id'
    ];
    public function branch() {
        return $this->belongsTo(branch::class,'branch_id');
    }
    public function appartments() {
        return $this->hasMany(appartment::class);
    }
    
}
