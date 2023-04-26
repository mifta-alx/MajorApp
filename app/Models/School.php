<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $primaryKey = 'npsn';

    protected $fillable = [
        'npsn',
        'school_name',
        'address',
        'city_regency',
        'province',
    ];
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
