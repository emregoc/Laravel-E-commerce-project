<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    use HasFactory;

    protected $table = 'user_products'; 

    protected $fillable = [     
        'user_id',          
        'product_id',
        'created_at',
        'updated_at',
        'quantity'
    ];

    public function product(){

        return $this->hasMany('App\Models\Product', 'id', 'product_id'); // Product modeli icinde ki id ye denk geliyor

    }
}
