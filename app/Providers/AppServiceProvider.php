<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Expr\AssignOp\Mod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      // ==================================================================================== //
      
        Model::unguard();
        

        // ================================================================================== //

        $user_pages = [
          'home' => '/',
          'product' => '/product',
          'contact' => '/contact',
          'about' => '/about',
          'testimonial' => '/testimonial',
          'blog' => '/blog',
          'cart' => '/cart',
          'checkout' => '/checkout',
          'profile' => '/user/profile',
          'login' => '/login',
          'register' => '/register',
          'invoices' => '/invoices',
          'forgot-password' => '/forgot-password',
          'email verification' => 'email/verify',
          'categories' => 'categories',
        ];

        // ==================================================================================== //
 
        if (request()->path()=='/') {
          $tab = 'HOME';
        } elseif (request()->path()=='product') {
          $tab = 'PRODUCT';
        } elseif (request()->is('product_details/**')) {
          $tab = 'PRODUCT DETAILS';
        } elseif (request()->path()=='contact') {
          $tab = 'CONTACT';
        } elseif (request()->path()=='about') {
          $tab = 'ABOUT';
        } elseif (request()->path()=='testimonial') {
          $tab = 'TESTIMONIAL';
        } elseif (request()->path()=='blog') {
          $tab = 'BLOG';
        } elseif (request()->path()=='cart') {
          $tab = 'CART';
        } elseif (request()->path()=='checkout') {
          $tab = 'CHECKOUT';
        } elseif (request()->path()=='user/profile') {
          $tab = 'PROFILE';
        } elseif (request()->path()=='login') {
          $tab = 'LOGIN';
        } elseif (request()->path()=='register') {
          $tab = 'REGISTER';
        } elseif (request()->path()=='logout') { 
          $tab = 'Logging out...';
        } elseif (request()->path()=='forgot-password') { 
          $tab = 'FORGOT PASSWORD';
        } elseif (request()->path()=='categories') { 
          $tab = 'CATEGORIES';
        } elseif (request()->path()=='invoices') { 
          $tab = 'INVOICES';
        } elseif (request()->path()=='success') { 
          $tab = 'PAYMENT SUCCESSFUL';
        } elseif (request()->path()=='cancel') { 
          $tab = 'PAYMENT CANCELLED';
        } elseif (request()->is('email/verify')) {
          $tab = 'EMAIL VERIFICATION';
        } elseif (request()->path()=='redirect') { ////// 
          $tab = 'Redirecting...';
        } elseif (request()->is('search/**')) {  
          $tab = 'SEARCH';
        } else {
          $tab = 'Loading...';
        }

        View::share([
          'website_info' => Contact::orderBy('position', 'asc')->get(), 
          'user_pages' => $user_pages,
          'tab' => $tab,
          "nav_categories" => Category::limit(5)->get(),
        ]);

    }
}
