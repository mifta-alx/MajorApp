<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = "nisn";

    protected $fillable = [
        'nisn',
        'uuid',
        'student_name',
        'gender',
        'birth_place',
        'birth_date',
        'npsn',
        'email',
        'phone',
    ];
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function score()
    {
        return $this->hasMany(Score::class);
    }
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
