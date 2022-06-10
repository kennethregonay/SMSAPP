<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    public function adviser(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function learners(){
        return $this->hasMany(Learner::class);
    }
}
