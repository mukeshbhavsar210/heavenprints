<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DiscountCodeController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShopController;

use App\Http\Controllers\custom\FrameController;
use App\Http\Controllers\custom\MetalFrameController;
use App\Http\Controllers\custom\NeonController;
use App\Http\Controllers\admin\PriceController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//Front pages routes
Route::controller(FrontController::class)->group(function() {
    Route::get('/', 'index')->name('front.home');
    Route::post('/add-to-wishlist', 'addToWishlist')->name('front.addToWishlist');
    Route::get('/page/{slug}', 'page')->name('front.page');
    Route::post('/send-contact-email', 'sendContactEmail')->name('front.sendContactEmail');
});

Route::controller(ShopController::class)->group(function() {
    Route::get('/shop/{categorySlug?}/{subCategorySlug?}','index')->name('front.shop');
    Route::get('/result/{searchCategorySlug?}/{searchSubCategorySlug?}','search')->name('front.search');
    Route::get('/product/{slug}', 'product')->name('front.product');
});

Route::get('/select', function() { return view('select'); })->name('select.page');

Route::controller(CartController::class)->group(function() {
    Route::get('/cart','cart')->name('front.cart');
    Route::post('/update-cart','updateCart')->name('front.updateCart');
    Route::post('/add-to-cart','addToCart')->name('front.addToCart');
    Route::post('/update-cart','updateCart')->name('front.updateCart');
    Route::post('/delete-item','deleteItem')->name('front.deleteItem.cart');
    Route::get('/checkout','checkout')->name('front.checkout');
    Route::post('/process-checkout','processCheckout')->name('front.processCheckout');
    Route::get('/thanks/{orderId}','thankyou')->name('front.checkout.thankyou');
    Route::post('/get-order-summary','getOrderSummary')->name('front.getOrderSummary');
    Route::post('/apply-discount','applyDiscount')->name('front.applyDiscount');
    Route::post('/remove-discount','removeCoupon')->name('front.removeCoupon');

    //Payment routes
    Route::post('payment', 'payment')->name('razor_payment');
    Route::post('/verify-payment', 'verifyPayment')->name('verify.payment');
    Route::post('checkout/razorpay', 'razorpayPayment')->name('checkout.razorpay');
    Route::get('/order-success','success')->name('order.success');
    Route::get('payment-failed', 'failed')->name('order.failed');
});

//Neon
Route::controller(NeonController::class)->group(function() {
    Route::get('/products/customize-neon-signs', 'index')->name('front.neon');
    Route::post('/generate-svg', 'generateSvg')->name('generate.svg');
    Route::get('/download-svg/{id}', 'download')->name('download.svg');
    Route::post('/update-svg', 'updateSVG')->name('store.svg');
    Route::post('/store-svg', 'storeSVG')->name('update.svg');
    Route::get('/get-stored-svgs', 'getStoredSVGs')->name('get.stored.svgs');
    Route::post('/save-svg', 'saveSVG')->name('save.svg');
});

//Metal Frames
Route::controller(MetalFrameController::class)->group(function() {
    Route::get('/metal-prints', 'index')->name('metal.front');
    Route::post('/store-selection', 'metalFrameSelection')->name('frame.selection');
    Route::post('/add-to-cart-metal-frame', 'addToMetalFrame')->name('cart.metalframe');
});

//Custom Frames
Route::controller(FrameController::class)->group(function() {
    Route::get('/uploadchoice', 'index')->name('frame.front');
    Route::post('/update-options', 'updateOptions')->name('update.options');
    Route::post('/delete-image', 'delete')->name('delete.image');
    Route::get('/check-image', 'checkImage')->name('check.image');
    Route::post('/upload-image', 'upload')->name('image.upload');
    Route::post('/get-frame-details', 'getFrameDetails')->name('get.frame.details');
    Route::post('/add-to-cart-frame', 'addToCartFrame')->name('cart.add');
    Route::post('/merge', 'mergeImage')->name('merge.image');
    Route::post('/store-selection-new', 'storeSelection')->name('store.selection');
    Route::get('/upload_choice', 'showSelection')->name('show.selection');    
});

//Metal Frame Rates calculations saved in session storage
Route::post('/store-total', function (Illuminate\Http\Request $request) {
    session(['grandTotal' => $request->grandTotal]);
    return response()->json(['success' => true, 'grandTotal' => session('grandTotal')]);
})->name('store.total');

//Store in session applied frames
Route::post('/store-frame', function (Request $request) {
    Session::put('frame_class', $request->frame_class);
    return response()->json(['success' => true, 'frame_class' => $request->frame_class]);
});

Route::post('/clear-prices', function () {
    Session::forget('image_options'); // Remove stored options
    return response()->json(['message' => 'Prices cleared successfully', 'status' => 'success']);
})->name('clear.prices');

Route::post('/calculate-price', [PriceController::class, 'calculatePrice'])->name('calculate.price');

//User realted
Route::group(['prefix' => 'account'], function(){
    Route::group(['middleware' => 'guest'], function(){
        Route::controller(AuthController::class)->group(function() {
            Route::get('/login','login')->name('account.login');
            Route::post('/login','authenticate')->name('account.authenticate');
            Route::get('/register','register')->name('account.register');
            Route::post('/process-register','processRegister')->name('account.processRegister');
        });        
    });

    Route::group(['middleware' => 'auth'], function(){
        Route::controller(AuthController::class)->group(function() {
            Route::get('/profile','profile')->name('account.profile');
            Route::post('/update-profile','updateProfile')->name('account.updateProfile');
            Route::post('/update-address','updateAddress')->name('account.updateAddress');
            Route::get('/change-password','changePasswordForm')->name('account.changePassword');
            Route::post('/process-change-password','changePassword')->name('account.processChangePassword');
            Route::get('/my-orders','orders')->name('account.orders');
            Route::get('/my-wishlist','wishlist')->name('account.wishlist');
            Route::post('/remove-product-from-wishlist','removeProductFromWishlist')->name('account.removeProductFromWishlist');
            Route::get('/order-detail/{orderId}','orderDetail')->name('account.orderDetail');
            Route::get('/logout','logout')->name('account.logout');
        });    
    });
});


//Admin related
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        //Category Routes
        Route::controller(CategoryController::class)->group(function() {
            Route::get('/categories', 'index')->name('categories.index');
            Route::get('/categories/create', 'create')->name('categories.create');
            Route::post('/categories', 'store')->name('categories.store');
            Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
            Route::post('/categories/{category}', 'update')->name('categories.update');
            Route::delete('/categories/{category}', 'destroy')->name('categories.delete');
        });

        //Sub Category Routes
        Route::controller(SubCategoryController::class)->group(function() {
            Route::get('/sub-categories', 'index')->name('sub-categories.index');
            Route::get('/sub-categories/create', 'create')->name('sub-categories.create');
            Route::post('/sub-categories', 'store')->name('sub-categories.store');
            Route::get('/sub-categories/{subCategory}/edit', 'edit')->name('sub-categories.edit');
            Route::post('/sub-categories/{subCategory}', 'update')->name('sub-categories.update');
            Route::delete('/sub-categories/{subCategory}', 'destroy')->name('sub-categories.delete');
        });

        //Brands
        Route::controller(BrandController::class)->group(function() {
            Route::get('/brands', 'index')->name('brands.index');
            Route::get('/brands/create', 'create')->name('brands.create');
            Route::post('/brands', 'store')->name('brands.store');
            Route::get('/brands/{brand}/edit', 'edit')->name('brands.edit');
            Route::put('/brands/{brand}', 'update')->name('brands.update');
            Route::delete('/brands/{brand}', 'destroy')->name('brands.delete');
        });

        //Product Route
        Route::controller(ProductController::class)->group(function() {
            Route::get('/products', 'index')->name('products.index');
            Route::get('/products/create', 'create')->name('products.create');
            Route::post('/products', 'store')->name('products.store');
            Route::get('/products/{product}/edit', 'edit')->name('products.edit');
            Route::post('/products/{product}', 'update')->name('products.update');            
            Route::delete('/products/{product}', 'destroy')->name('products.delete');
            Route::get('/get-products', 'getProducts')->name('products.getProducts');
        });

        //Sub Categories Connect to main Categories
        Route::get('/product-subcategories', [ProductSubCategoryController::class, 'index'])->name('product-subcategories.index');

        //Update or Delete Product
        Route::controller(ProductImageController::class)->group(function() {
            Route::post('/product-images/update', 'update')->name('product-images.update');
            Route::delete('/product-images', 'destroy')->name('product-images.destroy');
        });

        //Shipping Routes
        Route::controller(ShippingController::class)->group(function() {
            Route::get('/shipping/create', 'create')->name('shipping.create');
            Route::post('/shipping', 'store')->name('shipping.store');
            Route::get('/shipping/{id}', 'edit')->name('shipping.edit');
            Route::put('/shipping/{id}', 'update')->name('shipping.update');
            Route::delete('/shipping/{id}', 'destroy')->name('shipping.delete');
        });

        //Coupon Code Routes
        Route::controller(DiscountCodeController::class)->group(function() {
            Route::get('/coupons', 'index')->name('coupons.index');
            Route::get('/coupons/create', 'create')->name('coupons.create');
            Route::post('/coupons', 'store')->name('coupons.store');
            Route::get('/coupons/{coupon}/edit', 'edit')->name('coupons.edit');
            Route::put('/coupons/{coupon}', 'update')->name('coupons.update');
            Route::delete('/coupons/{coupon}', 'destroy')->name('coupons.delete');
        });

        //Orders Routes
        Route::controller(OrderController::class)->group(function() {
            Route::get('/orders', 'index')->name('orders.index');
            Route::get('/orders/{id}', 'detail')->name('orders.detail');
            Route::post('/order/change-status/{id}', 'changeOrderStatus')->name('orders.changeOrderStatus');
            Route::post('/order/send-email/{id}', 'sendInvoiceEmail')->name('orders.sendInvoiceEmail');
        });

        //Users Routes
        Route::controller(UserController::class)->group(function() {
            Route::get('/users', 'index')->name('users.index');
            Route::get('/users/create', 'create')->name('users.create');
            Route::post('/users', 'store')->name('users.store');
            Route::get('/users/{user}/edit', 'edit')->name('users.edit');
            Route::put('/users/{user}', 'update')->name('users.update');
            Route::delete('/users/{user}', 'destroy')->name('users.delete');
        });

        //Pages Routes
        Route::controller(PageController::class)->group(function() {
            Route::get('/pages', 'index')->name('pages.index');
            Route::get('/pages/create', 'create')->name('pages.create');
            Route::post('/pages', 'store')->name('pages.store');
            Route::get('/pages/{page}/edit', 'edit')->name('pages.edit');
            Route::put('/pages/{page}', 'update')->name('pages.update');
            Route::delete('/pages/{page}', 'destroy')->name('pages.delete');
        });

        //Temp image controller
        Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');

        //Setting Route
        Route::controller(SettingController::class)->group(function() {
            Route::get('/settings', 'index')->name('settings.index'); 
            Route::post('/settings/update', 'update')->name('settings.update');
            Route::post('/settings/socials', 'socials')->name('settings.socials');
            Route::get('/banners', 'banner_index')->name('banners.index');
            Route::get('/banners/create', 'create')->name('banners.create');
            Route::post('/banners', 'store')->name('banners.store');
            Route::get('/banners/{category}/edit', 'edit')->name('banners.edit');
            Route::put('/banners/{category}', 'update')->name('banners.update');
            Route::delete('/banners/{category}', 'destroy')->name('banners.delete');
            Route::post('/setting_store', 'store_setting')->name('setting.store');
            Route::get('/change-password', 'showChangePasswordForm')->name('admin.showChangePasswordForm');
            Route::post('/process-change-password', 'processChangePassword')->name('admin.processChangePassword');
        });

        //Setting Route
        // Route::get('/change-password', [SettingController::class, 'showChangePasswordForm'])->name('admin.showChangePasswordForm');
        // Route::post('/process-change-password', [SettingController::class, 'processChangePassword'])->name('admin.processChangePassword');

        Route::get('/getSlug', function(Request $request){
            $slug = '';
            if (!empty($request->title)) {
                $slug = Str::slug($request->title);
            }
            return response()->json([
                'status' => true,
                'slug' => $slug
            ]);
        })->name('getSlug');
    });
});
