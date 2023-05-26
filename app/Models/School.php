<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $fillable = [
        'uuid',
        'npsn',
        'school_name',
        'address',
        'city_regency',
        'province',
    ];
    public function student()
    {
        return $this->hasMany(Student::class, 'npsn', 'npsn');
    }
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
