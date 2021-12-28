<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * Product Fields with fillable
     */
    protected $fillable = [
        'name',
        'price',
        'upc',
        'status',
        'image',
    ];

    public $timestamps = true;
}
