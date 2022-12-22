<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\user;
use App\Models\Cart;
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

    public function Checkout(){
        return view ('user_template.checkout');
        
    }

    public function UserProfile(){

        return view ('user_template.userprofile');
        
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
