<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'required_date',
        'duration',
        'goods_type',
        'additional_details',
        'completed'
    ];
}