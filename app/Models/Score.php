<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'score_id';

    protected $fillable = [
        'nisn',
        'alternative_id',
        'criteria_id',
        'score',
    ];

    public function criteria(){
        return $this->hasMany(Criteria::class);
    }
    public function alternative(){
        return $this->hasMany(alternative::class);
    }
}
