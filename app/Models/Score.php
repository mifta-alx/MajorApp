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
        'criteria_id',
        'score',
    ];
    public function student(){
        return $this->belongsTo(Student::class, 'nisn', 'nisn');
    }
    public function criteria(){
        return $this->hasMany(Criteria::class, 'criteria_id', 'criteria_id');
    }
}
