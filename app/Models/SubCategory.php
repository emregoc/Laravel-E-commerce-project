<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = [
        'name',
        'category_id'
    ];

    public function category(){

        return $this->belongsTo(Category::class); 
    }                                           

    public function productSubCategory(){
        return $this->hasMany(Product::class, 'sub_category_id');
    }
}
