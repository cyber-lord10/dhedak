<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\NewsLetterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


#=============================================================================== #
#=============================================================================== #
#=============================== USER CONTROLLER =============================== #
#=============================================================================== #
#=============================================================================== #

Route::get('/', [HomeController::class, 'index'])->name('user-home');

Route::get('/product_details/{pid}', [HomeController::class, 'productDetails'])->name('product-details');

Route::post('/add_to_cart', [HomeController::class, 'addToCart'])->name('add-to-cart')->middleware('auth');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart')->middleware('auth');

Route::get('/remove_cart_item/{id}', [HomeController::class, 'removeCartItem'])->name('remove-cart-item')->middleware('auth');

Route::post('/update_cart_item/{id}', [HomeController::class, 'updateCartItem'])->name('update-cart-item')->middleware('auth');

Route::get('/product', [HomeController::class, 'product'])->name('product');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/testimonial', [HomeController::class, 'testimonial'])->name('testimonial');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

Route::get('/search/{phrase}', [HomeController::class, 'search'])->name('search');


# Where the STRIPE PAYMENT is concern
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout')->middleware(['auth', 'verified']);
Route::get('/success', [StripeController::class, 'success'])->name('checkout.success')->middleware(['auth', 'verified']);
Route::get('/cancel', [StripeController::class, 'cancel'])->name('checkout.cancel')->middleware(['auth', 'verified']);
Route::get('/invoices', [StripeController::class, 'invoices'])->name('checkout.invoices')->middleware(['auth', 'verified']);
Route::get('/invoice/request_mail/{id}', [StripeController::class, 'requestMail'])->middleware(['auth', 'verified']);


# CATEGORIES route, for showing all categories to user
Route::get('/categories', [HomeController::class, 'categories']);


# Where the mailing will be done
Route::post('/sendmail', [MailController::class, 'sendMail'])->name('sendmail')->middleware('verified');


# Google Authentcation process and validaiton
Route::get('/auth/google', [GoogleController::class, 'googlePage'])->name('google-page');
Route::get('/auth/google/callback', [GoogleController::class, 'googleCallBack']);

# GitHub Authentcation process and validaiton
Route::get('/auth/github', [GitHubController::class, 'gitHubPage'])->name('github-page');
Route::get('/auth/github/callback', [GitHubController::class, 'gitHubCallBack']);

# Twitter Authentcation process and validaiton
Route::get('/auth/twitter', [TwitterController::class, 'twitterPage'])->name('twitter-page');
Route::get('/auth/twitter/callback', [TwitterController::class, 'twitterCallBack']);

# Subscription to newsletrer, news , feeds and daily updates about the site
Route::post('/newsletter_subscription', [NewsLetterController::class, 'subscribe'])->name('newsletter-subscription');

# Subscription to coupons 
Route::post('/coupon_subscribe', [CouponController::class, 'subscribe'])->name('coupon_subscribe');



# -------------------------------------------------------------------------------------- #


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session')
])->group(function () {
    Route::get('/dashboard', function () {
      $usertype = Auth::user()->usertype;
      if ($usertype == 0 ) {
        return redirect()->back();
      } else {
        return view('admin.dashboard.home');
      }
    })->name('dashboard');
});






//========================   DETERMINING WETHER IT'S A USER OR AN ADMIN ============= //
Route::get('/redirect', [HomeController::class, 'redirect'])->name('home-redirect')->middleware('auth'); 







# =============================================================================== #
# =============================================================================== #
# ============================== ADMIN CONTROLLER =============================== #
# =============================================================================== #
# =============================================================================== #



#------------------------------- CATEGORY controllers -------------------------- #

Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('view-category')->middleware('auth');

Route::post('/add_category', [AdminController::class, 'addCategory'])->middleware('auth');

Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->middleware('auth');

Route::get('/update_category/{id}', [AdminController::class, 'updateCategory'])->middleware('auth');

Route::post('/update_category/update/{id}', [AdminController::class, 'updateConfrimCategory'])->middleware('auth');

Route::post('/switch_category', [AdminController::class, 'switchCategory'])->middleware('auth');

Route::post('/switch_category_confrim', [AdminController::class, 'switchCategoryConfirm'])->middleware('auth');


#------------------------------- PRODUCT controllers -------------------------- #

Route::post('/add_product', [AdminController::class, 'addProduct'])->middleware('auth');

Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->middleware('auth');

Route::get('/update_product/{id}', [AdminController::class, 'updateProduct'])->middleware('auth');

Route::post('/update_product/update/{id}', [AdminController::class, 'updateProductUpdate'])->middleware('auth');

Route::get('/products/{sub_section}', [AdminController::class, 'product'])->middleware('auth');


#------------------------------- CONTACT INFO controllers -------------------------- #

Route::get('/admin/contact', [AdminController::class, 'adminContact'])->middleware('auth');

Route::post('/admin/contact/add', [AdminController::class, 'adminAddContact'])->middleware('auth');

Route::get('/delete_contact_info/{id}', [AdminController::class, 'deleteContactInfo'])->middleware('auth');

Route::get('/admin/contact/update/{id}', [AdminController::class, 'adminUpdateContact'])->middleware('auth');

Route::post('/admin/contact/update_confirm', [AdminController::class, 'adminUpdateConfirmContact'])->middleware('auth');


#------------------------------- ADVERT controllers -------------------------- #

Route::post('/admin/advert/add', [AdminController::class, 'adminAddAdvert'])->middleware('auth');

Route::get('/delete_advert/{id}', [AdminController::class, 'deleteAdvert'])->middleware('auth'); 

Route::get('/admin/advert/update/{id}', [AdminController::class, 'adminUpdateAdvert'])->middleware('auth');

Route::post('/admin/advert/update_confirm', [AdminController::class, 'adminUpdateConfirmAdvert'])->middleware('auth');

Route::get('/admin/advert/documentation', [AdminController::class, 'adminAdvertDocumentation'])->middleware('auth');

Route::get('/admin/advert/{sub_section}', [AdminController::class, 'adminAdvert'])->middleware('auth');


#------------------------------- TESTIMONIAL controllers -------------------------- #

Route::post('/admin/testimonial/add', [AdminController::class, 'adminAddTestimonial'])->middleware('auth');

Route::get('/delete_testimonial/{id}', [AdminController::class, 'deleteTestimonial'])->middleware('auth'); 

Route::get('/admin/testimonial/update/{id}', [AdminController::class, 'adminUpdateTestimonial'])->middleware('auth');

Route::post('/admin/testimonial/update_confirm', [AdminController::class, 'adminUpdateConfirmTestimonial'])->middleware('auth');

Route::get('/admin/testimonial/change_testimonial_position', [AdminController::class, 'changeTestimonialPosition'])->middleware('auth');

Route::post('/admin/change_testimonial_position_confrim', [AdminController::class, 'changeTestimonialPositionConfirm'])->middleware('auth');

Route::get('/admin/testimonial/{sub_section}', [AdminController::class, 'adminTestimonial'])->middleware('auth');



#----------------------------- MASTER-ADMIN & SUB-ADMINS controllers ------------------------ #

Route::get('/admins', [AdminController::class, 'admin'])->middleware('auth');

Route::post('/admin/admin/add', [AdminController::class, 'addAdmin'])->middleware('auth');

Route::get('/admin/admin/remove/{id}', [AdminController::class, 'removeAdmin'])->middleware('auth');

Route::get('/admin/admin/drop_self', [AdminController::class, 'dropSelf'])->middleware('auth');

Route::get('/admin/admin/make_master/{id}', [AdminController::class, 'makeMasterAdmin'])->middleware('auth');

Route::get('/admin/admin/remove_master/{id}', [AdminController::class, 'removeMasterAdmin'])->middleware('auth');

Route::get('/admin/admin/drop_self_master', [AdminController::class, 'dropSelfMaster'])->middleware('auth');



// Route::get('/trial/{id}', function ($id) {
//     Auth::login(User::find($id));
//     // dd(User::find($id));
// })->middleware('guest');