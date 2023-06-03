<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $primaryKey = 'major_id';
    protected $fillable = [
        'major',
        'criteria_id',
    ];
    public function criteria(){
        return $this->hasMany(Criteria::class, 'criteria_id', 'criteria_id');
    }
}
