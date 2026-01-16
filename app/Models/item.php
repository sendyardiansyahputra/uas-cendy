<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'stock',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
