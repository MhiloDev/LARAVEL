<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    //$productImages->product
    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function getUrlAttribute(){
        if(substr($this->img, 0, 4) === "http"){
            return $this->img;
        }

        return 'images/products/'.$this->img;
    }
}
