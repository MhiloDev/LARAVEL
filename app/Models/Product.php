<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'category_id', 'price'];
    // $product->category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // $product->image
    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getCategoryNameAttribute()
    {
        if ($this->category) {
            return $this->category->name;
        }
        return 'General';
    }
}