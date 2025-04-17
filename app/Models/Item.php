<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'regular_price', 'real_price', 'image'];
    protected $casts = [
        'regular_price' => 'decimal:2',
        'real_price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   
}


