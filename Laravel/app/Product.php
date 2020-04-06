<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function lines()
    {
        return $this->belongsToMany(ProductLine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function discounts()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id');
    }
}
