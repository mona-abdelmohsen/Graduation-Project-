<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function regions() {
        return $this->hasMany(region::class);
    }
    public function appartment() {
        return $this->hasMany(appartment::class);
    }

    public function manager() {
        return $this->belongsTo(User::class,'user_id');
    }
}
