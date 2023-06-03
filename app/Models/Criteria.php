<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $primaryKey = 'criteria_id';

    protected $fillable = [
        'criteria_name',
        'criteria_code',
        'weight'
    ];

    public function subcriteria(){
        return $this->hasMany(Subcriteria::class, 'criteria_id', 'criteria_id');
    }
    public function major(){
        return $this->hasMany(Major::class, 'criteria_id', 'criteria_id');
    }
}
