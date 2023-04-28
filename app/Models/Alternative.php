<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $primaryKey = 'alternative_id';

    protected $fillable = [
        'alternative_name',
    ];
}
