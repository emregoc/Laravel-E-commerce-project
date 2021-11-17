<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'user_id',
        'user_payment_id',
        'payment_type_id',
        'adress_id',
        'total'
    ];
    
    public function orderDetail(){

        return $this->hasMany('App\Models\OrderItem', 'order_detail_id', 'id'); 
                    
    }

    public function userPayment(){

        return $this->hasMany('App\Models\UserPayment', 'id', 'user_payment_id'); 
                        
    }

    public function paymentType(){

        return $this->hasMany('App\Models\PaymentType', 'id', 'payment_type_id'); 

    }

    public function userAdress(){

        return $this->hasMany('App\Models\UserAdress', 'id', 'adress_id'); 

    }
}
