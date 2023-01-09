<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\user;
use App\Models\Cart;
use App\Models\Shippinginfo;
use App\Models\Order;


use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function CategoryPage($id){
        $category = Category::findOrfail($id);
        $products = Product::where('product_category_id',$id)->latest()->get();
        return view ('user_template.category', compact('category','products'));
    }

    public function SingleProduct($id){
        $product = Product::findOrfail($id);
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id',$subcat_id)->latest()->get();


        return view ('user_template.singleproduct', compact('product','related_products'));
        
    }

    public function AddToCart(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view ('user_template.addtocart', compact('cart_items'));
        
    }

    public function AddProductToCart(Request $request){

        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;

        Cart::insert([
            'product_id'=>$request->product_id,
            'user_id'=> Auth::id(),
            'quantity'=>$request->quantity,
            'price' =>$price
        ]);

        return redirect()->route('addtocart')->with('message', 'Your item added to cart successfully!');
        
    }

    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your item removed form cart successfully!');
    }

    public function GetShippingAddress(){

        return view ('user_template.shippingaddress');

    }


    public function AddShipingInfo(Request $request){
        Shippinginfo::insert([
            'user_id'=> Auth::id(),
            'phone_number' => $request->phone_number,
            'city_name' => $request->city_name,
            'area' => $request->area,
            'address' => $request->address,            
        ]);   
        
        return redirect()->route('checkout');

    }


    public function Checkout(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = Shippinginfo::where('user_id', $userid)->first();

        return view ('user_template.checkout',compact('cart_items','shipping_address'));
        
    }

    public function PlaceOrder(){
        $userid = Auth::id();
        $shipping_address = Shippinginfo::where('user_id', $userid)->first();
        $cart_items = Cart::where('user_id', $userid)->get();

        foreach($cart_items as $item){
            Order::insert([
                'userid' => $userid,
                'shipping_phonenumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city_name,
                'shipping_area' => $shipping_address->area,
                'shipping_address' => $shipping_address->address,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,

            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();

        }
        return redirect()->route('pendingorders')->with('message', 'Your Order has been placed successfully!');


    }



    public function UserProfile(){

        return view ('user_template.pendingorders');
        
    }
    public function PendingOrders(){

        return view ('user_template.pendingorders');
        
    }
    public function History(){

        return view ('user_template.history');
        
    }

    

    public function NewRelease(){
        return view ('user_template.newrelease');
        
    }

    public function TodaysDeal(){
        return view ('user_template.todaysdeal');
        
    }

    public function CustomerService(){
        return view ('user_template.customerservice');
        
    }
}
