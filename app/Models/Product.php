<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'specifications' => 'array',
        'allow_backorders' => 'boolean',
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
        'is_new' => 'boolean',
        'has_variations' => 'boolean',
    ];

    protected $fillable = [
        'name', 'slug', 'description', 'short_description', 'sku',
        'price', 'sale_price', 'cost_price', 'stock_quantity',
        'allow_backorders', 'is_available', 'is_featured', 'is_new',
        'has_variations', 'weight', 'height', 'width', 'length',
        'category_id', 'brand_id', 'supplier_id', 'specifications',
        'meta_title', 'meta_description', 'meta_keywords'
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProductMedia::class)->where('is_main', true);
    }

    // Helpers
    public function getDiscountPercentageAttribute()
    {
        if ($this->sale_price && $this->price) {
            return round((($this->price - $this->sale_price) / $this->price) * 100);
        }
        return 0;
    }

    public function inStock()
    {
        return $this->stock_quantity > 0 || $this->allow_backorders;
    }
}