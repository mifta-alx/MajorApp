<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcriteria extends Model
{
    use HasFactory;

    protected $primaryKey = 'subcriteria_id';

    protected $fillable = [
        'criteria_id',
        'subcriteria_start',
        'subcriteria_end',
        'subcriteria_score',
    ];

    public function criteria(){
        return $this->belongsTo(Criteria::class, 'criteria_id', 'criteria_id');
    }
}
