<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'user_id',
        'product_id',
        'order_detail_id',
        'quantity',
        'product_total_price'
    ];

    public function orderItem(){

        return $this->hasMany('App\Models\Product', 'id', 'product_id'); 
                        
    }

   
}
