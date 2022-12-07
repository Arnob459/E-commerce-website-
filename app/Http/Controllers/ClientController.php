<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\user;


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
        return view ('user_template.addtocart');
        
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

    public function AddProductToCart(){

        return view ('user_template.addproducttocart');
        
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
