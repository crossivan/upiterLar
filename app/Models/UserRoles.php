<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    use HasFactory;
    protected $guarded = [];

//    public function rituals()
//    {
//        return $this->hasMany(Ritual::class, 'user_id');
//    }
}
