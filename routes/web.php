<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\OrderController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\RegisterController;
use App\Http\Controllers\web\AccountController;
use App\Http\Controllers\web\RazorpayPaymentController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TwoFactorAuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController as admin_product;
use App\Http\Controllers\Admin\CommonSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\FAQController;

use App\Http\Controllers\ImageController;
// use Intervention\Image\Facades\Image;

// Route::get('/test-image', function () {
//     $img = Image::canvas(300, 100, '#0000ff');
//     $img->save(public_path('blue-bar.jpg'));

//     return 'Blue image saved to public/blue-bar.jpg';
// });

Route::get('cache_clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    echo "cache cleared..";
});

Route::get('test', function () {
    return view('web.12');
});

Route::get('about', function () {
    return view('web.pages.about');
});
Route::get('terms-and-conditions', function () {
    return view('web.pages.terms-and-conditions');
});
Route::get('shipping-delivery-policy', function () {
    return view('web.pages.shipping-delivery-policy');
});
Route::get('cancellation-refund-policy', function () {
    return view('web.pages.cancellation-refund-policy');
});
Route::get('contact-us', function () {
    return view('web.pages.contact-us');
});
Route::get('privacypolicy', function () {
    return view('web.pages.privacypolicy');
});

    Route::controller(ProductController::class)->group(function () {

        Route::get('new','new')->name('');
        Route::get('/','home_page')->name('home');
        // Route::get('more-products','more_product')->name('product.more');
        Route::get('more-products',  'moreProduct')->name('more-products');
        Route::get('product/show/{id}','details_page')->name('product.show');
    });   

    Route::middleware(['auth'])->group(function () {

        Route::controller(OrderController::class)->group(function () { 
            Route::get('addOrder/{id}','addOrder')->name('order.add');
            Route::post('place/order','placeOrder')->name('order.place');
            
            Route::get('orders/history', 'orderHistory')->name('orders.history');  // order page 

            Route::get('track', 'track')->name('track');  // order page 
        });

        Route::controller(AccountController::class)->group(function () {

            Route::get('user/dashboard','dashboard')->name('user.dashboard');
            Route::post('update/account','update_account')->name('update.account');

            Route::get('/logout', 'logout')->name('user.logout');
        });
    });

    Route::controller(RegisterController::class)->group(function () {
   
        Route::get('sign-in', function () {
            return view('web.sign-in');
        })->name('sign-in');

        Route::post('/register', 'register')->name('user.register');
        Route::post('/login', 'login')->name('login');
    });
    
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

// ****************************************** ADMIN ROUTES ************************************************* //
Route::prefix('admin')->group(function () {

    Route::group(['middleware' => ['admin']], function() {
        Route::get('2fa/setup', [TwoFactorAuthController::class, 'show2faForm'])->name('2fa.form');
        Route::post('2fa/setup', [TwoFactorAuthController::class, 'setup2fa'])->name('2fa.setup');
        Route::get('2fa/verify', [TwoFactorAuthController::class, 'showVerifyForm'])->name('2fa.verifyForm');
        Route::post('2fa/verify', [TwoFactorAuthController::class, 'verify2fa'])->name('2fa.verify');
    });

    // Optional: Also prefix login routes if admin login is separate
    Route::get('login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

    // Route::middleware(['2fa','session.timeout','admin'])->group(function () {

        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('account_setting', [AuthController::class, 'account_setting'])->name('account_setting');
        Route::post('account_setting_change', [AuthController::class, 'account_setting_change'])->name('post.account_setting');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('faqs', FAQController::class);
        Route::post('faqs/delete/{id}', [FAQController::class, 'destroy_faqs'])->name('faqs.delete');

        Route::resource('categories', CategoryController::class);
        Route::post('categories/delete/{id}', [CategoryController::class, 'destroy_sub_categories'])->name('sub_categories.delete');
       
        Route::resource('brands', BrandController::class);
        Route::post('brands/delete/{id}', [BrandController::class, 'destroy_brands'])->name('brands.delete');
               
        Route::resource('products', admin_product::class);
        Route::post('admin/products/delete/{id}', [admin_product::class, 'destroy_products'])->name('products.delete');
        Route::post('/products/image/{id}', [admin_product::class, 'removeImage'])->name('products.image.delete');

        Route::resource('users', UserController::class);
        Route::get('get_order_list', [UserController::class, 'get_order_list'])->name('get_order_list');
    // });
    
    Route::get('get_setting', [CommonSettingController::class, 'get_setting'])->name('get_setting');
    Route::post('change_setting', [CommonSettingController::class, 'change_setting'])->name('change_setting');
});

Route::get('image-upload', [ImageController::class, 'index']);
Route::post('image-upload', [ImageController::class, 'store'])->name('image.store');