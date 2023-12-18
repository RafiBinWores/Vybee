<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'description',
        'price',
        'compare_price',
        'is_feature',
        'sku',
        'barcode',
        'quantity',
        'track_quantity',
        'status'
    ];

    public function product_images()
    {
        return $this->hasMany(productImage::class);
    }
}
