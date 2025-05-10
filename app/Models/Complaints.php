<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
protected $fillable = [
    'complaint_title',
    'complaint_type',
    'complaint_status',
    'address',
    'district',
    'pin_code',
    'image',
    'location_link',
];
}
