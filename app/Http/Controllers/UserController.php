<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAdress;
use App\Models\UserPayment;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function profile(){
        
        return view('profile.edit');
    }

    public function updatePassword(){
        
        return view('profile.update-password');
    }

    public function addCart(Request $request){

        $productId = $request->get('product_id');
      

        try {
            
            $userId = auth()->user()->id; 
            if($userId){                   
                UserProduct::create([
                    "user_id" => $userId,
                    "product_id" => $productId,
                    "quantity" => 1
                ]);
                return back();
            }

        } catch (Throwable $e) {
            return redirect('/signin');
      
        }
        
    }

    public function userCartItem(){

      
        try{

            $userId = auth()->user()->id;
            if($userId){
            $userProducts = UserProduct::join('products', 'user_products.product_id', '=', 'products.id')
                                        ->where('user_id', $userId)
                                        ->select('products.*')->get(); // tablo birlestirerek urunlere ulastık
            return view('cart.cart-item', compact('userProducts'));
            }
        } catch(Throwable $e){
            return redirect('/signin');
        }
        
    }

    public function payment(){
        $userId = auth()->user()->id;                  
        $userProducts = UserProduct::join('products', 'user_products.product_id', '=', 'products.id')
                                     ->where('user_id', $userId)
                                     ->select('products.*', 'user_products.*')->get();
        $userPayments = UserPayment::where('user_id', $userId)->get(); // hesap kartları
        $userAdresses = UserAdress::where('user_id', $userId)->get();
        $paymentTypes = PaymentType::all();
       // dd($userProducts);
        $totals = $this->totalPrice($userProducts);

        return view('payment.payment-index', compact('userProducts', 'userPayments', 'userAdresses','totals','paymentTypes'));
    }

    public function totalPrice($userProductPrices){ 
                    
        $totalPrice = 0;                           
        $price = 0; 
        $productTotalPrice = [];
        $i = 0;
        foreach($userProductPrices as $userProductPrice){
            $price = $userProductPrice->price * $userProductPrice->quantity; 
            $totalPrice = $totalPrice + $price; 
           // $productTotalPrice[$i] = $price; 
           // $i++;
        }
        //$returnTotal = [ 
         //   "productTotalPrice" => $productTotalPrice,
         //   "totalPrice" => $totalPrice
        //];
        
        return $totalPrice;
    }   

    public function paymentResult(Request $request){

       
        $userId = auth()->user()->id; 
        $adressId = $request->get('adress_id'); 
        $cartId = $request->get('cart_id');
        $paymentTypeId = $request->get('payment_type_id');
        $total = $request->get('total');
        OrderDetail::create([
            "user_id" => $userId,
            "adress_id" => $adressId,
            "user_payment_id" => $cartId,
            "payment_type_id" => $paymentTypeId,
            "total" => $total,
        ]);

      
        $data = OrderDetail::latest('id')->where('user_id', $userId)->get()->first(); 
        $lastId = $data->id;                       

        $userProducts = UserProduct::join('products', 'user_products.product_id', '=', 'products.id')
                                     ->where('user_id', $userId) 
                                     ->select('products.*', 'products.id as productId', 'user_products.*')->get();
       
        $productTotalPrice = 0;
        foreach($userProducts as $userProduct){
            $productTotalPrice = $userProduct->price * $userProduct->quantity;
            OrderItem::create([
                "user_id" => $userId,
                "product_id" => $userProduct->productId,
                "order_detail_id" => $lastId,
                "quantity" => $userProduct->quantity,
                "product_total_price" => $productTotalPrice
            ]);
        }
        return back();
       
    }

    public function myOrders(){

       

        $userId = auth()->user()->id; 
        
     
        $orders = OrderDetail::with('userPayment','paymentType','userAdress','orderDetail.orderItem') 
                            ->where('user_id', $userId)->get(); 
        

        return view('cart.orders', compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
