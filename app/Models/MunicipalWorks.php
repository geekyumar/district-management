<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipalWorks extends Model
{
    protected $fillable = [
    'work_type',
    'assigned_by',
    'assigned_to',
    'instructions',
    'location',
    'status',
    'remarks',
];
}
