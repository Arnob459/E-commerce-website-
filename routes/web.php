<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashnboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\SubAdminController;






use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(HomeController::class)->group(function(){
    Route::get('/','Index')->name('Home');
});

Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}','CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}','SingleProduct')->name('singleproduct');
    Route::get('/new-release','NewRelease')->name('newrelease');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:user'])->group(function(){
    Route::controller(ClientController::class)->group(function(){
        Route::get('/add-to-cart','AddToCart')->name('addtocart');
        Route::post('/add-product-to-cart','AddProductToCart')->name('addproducttocart');

        Route::get('/checkout','Checkout')->name('checkout');
        Route::get('/user-profile','UserProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders','PendingOrders')->name('pendingorders');
        Route::get('/user-profile/history','History')->name('history');


        Route::get('/todays-deal','TodaysDeal')->name('todaysdeal');
        Route::get('/customer-service','CustomerService')->name('customerservice');
    });
});


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(DashnboardController::class)->group(function(){
        Route::get('admin/dashboard', 'index')->name('admindashboard');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('admin/all-category', 'AllCategory')->name('allcategory');
        Route::get('admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('admin/edit-category/{id}','EditCategory')->name('editcategory');
        Route::post('admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('admin/delete-category/{id}','DdeleteCategory')->name('deletecategory');

    });

    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('admin/all-subcategory', 'AllSubCategory')->name('allsubcategory');
        Route::get('admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('admin/edit-subcategory/{id}','EditSubCat')->name('editsubcategory');
        Route::post('admin/update-subcategory', 'UpdatesubCat')->name('updatesubcategory');
        Route::get('admin/delete-subcategory/{id}','DeleteSubCat')->name('deletesubcategory');




    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('admin/all-products', 'AllProduct')->name('allproducts');
        Route::get('admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('admin/edit-product-image/{id}','EditProductImg')->name('editproductimg');
        Route::post('admin/update-product-image', 'UpdateProductImage')->name('updateproductimage');
        Route::get('admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::post('admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('admin/delete-product/{id}','DeleteProduct')->name('deleteproduct');


    });

    Route::controller(SubAdminController::class)->group(function(){
        Route::get('admin/all-subadmin', 'AddSubAdmin')->name('addsubadmin');
        Route::post('admin/store-storesubadmin', 'StoreSubAdmin')->name('storesubadmin');
        Route::get('admin/all-subadmins', 'AllSubAdmins')->name('allsubadmins');
        Route::get('admin/edit-subadmin/{id}', 'EditSubadmin')->name('editsubadmin');
        Route::post('admin/update-subadmin', 'UpdateSubadmin')->name('updatesubadmin');
        Route::get('admin/delete-subadmin/{id}','DeleteSubadmin')->name('deletesubadmin');

    });

    // Route::controller(ClientController::class)->group(function(){
    //     Route::get('/add-to-cart','AddToCart')->name('addtocart');
    //     Route::get('/checkout','Checkout')->name('checkout');
    //     Route::get('/user-profile','UserProfile')->name('userprofile');
    //     Route::get('/todays-deal','TodaysDeal')->name('todaysdeal');
    //     Route::get('/customer-service','CustomerService')->name('customerservice');
    // });

    Route::controller(OrderController::class)->group(function(){
        Route::get('admin/prnding-order', 'PendingOrder')->name('pendingorder');

    });
});

require __DIR__.'/auth.php';

