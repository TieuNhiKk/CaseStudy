<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
