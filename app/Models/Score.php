<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    public function criteria(){
        return $this->hasMany(Criteria::class);
    }
    public function alternative(){
        return $this->hasMany(alternative::class);
    }
}
