<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $primaryKey = 'result_id';
    protected $fillable = [
        'nisn',
        'saw_result',
        'recomendation_result',
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'nisn', 'nisn');
    }
    public function getRouteKeyName()
    {
        return 'nisn';
    }
}
