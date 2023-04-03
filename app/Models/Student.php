<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function school(){
        return $this->belongsTo(School::class);
    }
    public function score(){
        return $this->hasMany(Score::class);
    }
}
