<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; 

    protected $fillable = [ 
        'name',                
        'price',
        'category_id',
        'sub_category_id',
        'created_at',
        'updated_at'
    ];

   

    public function productRelationSubCategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
