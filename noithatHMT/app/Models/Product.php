<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = 'id';
    protected $fillable = [
        'Product_name',
        'category_id',
        'brand_id',
        'Product_price',
        'image',
        'Product_quantity',
        'Product_description'
    ];

}
