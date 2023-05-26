<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
    protected $table = 'rankings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ranking',
        'nisn',
        'npsn',
        'result_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'nisn', 'nisn');
    }
    public function school(){
        return $this->belongsTo(School::class, 'npsn', 'npsn');
    }
    public function result(){
        return $this->belongsTo(Result::class, 'result_id', 'result_id');
    }
}
