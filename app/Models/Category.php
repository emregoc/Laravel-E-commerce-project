<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SubCategories;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function subCategories(){  

        return $this->hasMany(SubCategory::class, 'category_id'); 
                                                                
    }                                                           

   
}
