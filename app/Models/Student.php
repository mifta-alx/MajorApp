<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = "uuid";
    public $incrementing = false;
    protected $fillable = [
        'uuid',
        'nisn',
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
        return $this->belongsTo(School::class, 'npsn', 'npsn');
    }
    public function score()
    {
        return $this->hasMany(Score::class, 'nisn', 'nisn');
    }
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
