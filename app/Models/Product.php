<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'slug', 'name', 'category_id', 'price', 'image', 'swatch',
        'best_seller', 'featured', 'customizable', 'description', 'details',
    ];

    protected $casts = [
        'details' => 'array',
        'best_seller' => 'boolean',
        'featured' => 'boolean',
        'customizable' => 'boolean',
        'price' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function imageUrl(): string
    {
        // Support absolute URLs, public/ paths, and storage/ paths.
        if (str_starts_with($this->image, 'http')) return $this->image;
        if (str_starts_with($this->image, 'storage/')) return asset($this->image);
        if (str_starts_with($this->image, 'products/')) return asset('storage/' . $this->image);
        return asset($this->image); // e.g. images/product-x.jpg
    }
}
