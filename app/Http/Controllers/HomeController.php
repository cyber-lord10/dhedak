<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

  public function visualizeBody($body)
  {

    // Convert to boostrap's **BADGE** class elements
    $body = str::replace('<badge>', '<span class="badge badge-danger text-shadow-none">', $body, false);
    $body = str::replace('</badge>', '</span>', $body, false); 

    // Convert to boostrap's **BOLD** class elements
    $body = str::replace('<bold>', '<span class="fw-bolder">', $body, false);
    $body = str::replace('</bold>', '</span>', $body, false);

    // Convert to boostrap's **RED** class elements
    $body = str::replace('<red>', '<span class="text-danger">', $body, false);
    $body = str::replace('</red>', '</span>', $body, false);

    // Convert to boostrap's **UNDERLINE** class elements
    $body = str::replace('<underline>', '<span class="underline">', $body, false);
    $body = str::replace('</underline>', '</span>', $body, false);

    // Convert to boostrap's **OVERLINE** class elements
    $body = str::replace('<overline>', '<span class="overline">', $body, false);
    $body = str::replace('</overline>', '</span>', $body, false);

    // Convert to boostrap's **CANCEL** class elements
    $body = str::replace('<cancel>', '<span class="cancel">', $body, false);
    $body = str::replace('</cancel>', '</span>', $body, false);

    // Convert to boostrap's **CANCEL** class elements
    $body = str::replace('<italics>', '<i>', $body, false);
    $body = str::replace('</italics>', '</i>', $body, false);

    return $body;
  
  }

  public function firstLetterUpper($string)
  {
    return str::ucfirst($string);
  }


  public function index()
  {
    $products = Product::latest()->paginate(3);
    $adverts = Banner::all();
    $testimonials = Testimonial::orderBy('position', 'asc')->get();

    foreach ($adverts as $advert) {
      $advert->text = $this->firstLetterUpper($advert->text);
      $advert->text = $this->visualizeBody($advert->text);
    }

    return view('home.userpage', compact('products', 'adverts', 'testimonials'));
  }
  

  public function redirect() {
    $usertype = Auth::user()->usertype;
    if ($usertype == 0) return redirect('/'); else return redirect('/dashboard');     
  }


  public function productDetails($pid)
  {
    $product = Product::where('product_id', $pid)->first();
    $product->category = Category::where('category_id', $product->category)
                                    ->first()
                                    ->category_name;
    return view('home.product_details', compact('product'));
  }


  public function addToCart(Request $request)
  {      
      $user = Auth::user();
      
      if ( $existing_cart = DB::select('SELECT product_quantity FROM carts WHERE product_id = ? AND user_id = ? LIMIT 1', [$request->pid, Auth::user()->id])) 
      {   
        $prev_qty = $existing_cart[0]->product_quantity; 
        $new_qty = $prev_qty + $request->quantity;  
        DB::update('UPDATE carts SET product_quantity = ? WHERE product_id = ? AND user_id = ? LIMIT 1', [$new_qty, $request->pid, Auth::user()->id]);
      }
      
      else 
      
      {
        $product = Product::find($request->pid);        
        $cart = new Cart;

        $cart_id = random_int(99, 100000);

        $cart->name = $user->name;
        $cart->cart_id = $cart_id;
        $cart->email = $user->email;
        $cart->phone = $user->phone; 
        $cart->address = $user->address;
        $cart->product_title = $product->title;
        $cart->product_id = $product->id;
        $cart->user_id = $user->id;
        $cart->price = $product->price;
        $cart->product_quantity = trim($request->quantity);
        $cart->image = $product->image;
        $cart->description = $product->description;
        $cart->category = $product->category;
        
        $cart->save();        
      }

      return redirect()->back();

  }


  public function cart() 
  {
    if (Auth::check()) 
    {
      $user_id = Auth::user()->id;
      $carts = Cart::where('user_id', '=', $user_id)->latest()->get();
      return view('home.cart', compact('carts'));
    } 
    else 
    {
      return redirect('login');
    }
  }


  public function removeCartItem($id)
  {
    $cart = Cart::find($id);
    $cart->delete();
    return redirect()->back()->with('cart', $cart);
}


  public function updateCartItem(Request $request, $id)
  {
    $cart = Cart::find($id);
    $cart->product_quantity = trim($request->quantity);

    $cart->save();

    return redirect()->back()->with('cart', $cart);
  }


  public function checkout()
  {
    return view('home.checkout');
  }


  public function product()
  {
    if (request()->category ?? false) {
      $category = Category::where('category_name',  request()->category)->first();
      if ($category) 
      {
        $products = Product::latest()->where('category', $category->category_id)->paginate(20);
      } else 
      {
        $products = [];
      }
      $subtitle = 'Filter By <span>Category</span>';
    } else 
    {
      $products = Product::latest()->paginate(20);
      $subtitle = 'Our <span>products</span>';
    }
    return view('home.products', compact('products', 'subtitle'));
  }


  public function contact()
  {
    return view('home.contact');
  }


  public function about()
  {
    return view('home.about');
  }


  public function testimonial()
  {
    $testimonials = Testimonial::orderBy('position', 'asc')->get();
    return view('home.testimonial', compact('testimonials'));
  }


  public function blog()
  {
    $testimonials = Testimonial::orderBy('position', 'asc')->get();
    return view('home.blog', compact('testimonials'));
  }


  public function categories()
  {
    $categories = Category::all();
    return view('home.categories', compact('categories'));
  }
  

  public function search($phrase) 
  {
    $category = Category::where('category_name', 'LIKE', "%$phrase%")->first();
    if ($category) 
    {
      $products = Product::where('product_id', 'LIKE', "%$phrase%")
        ->orWhere('title', 'LIKE', "%$phrase%")
        ->orWhere('description', 'LIKE', "%$phrase%")
        ->orWhere('quantity', 'LIKE', "%$phrase%") 
        ->orWhere('price', 'LIKE', "%$phrase%")
        ->orWhere('discount_price', 'LIKE', "%$phrase%")
        ->orWhere('category', $category->category_id)
        ->latest()
        ->paginate(20);
    } else 
    {
      $products = Product::where('product_id', 'LIKE', "%$phrase%")
      ->orWhere('title', 'LIKE', "%$phrase%")
      ->orWhere('description', 'LIKE', "%$phrase%")
      ->orWhere('quantity', 'LIKE', "%$phrase%") 
      ->orWhere('price', 'LIKE', "%$phrase%")
      ->orWhere('discount_price', 'LIKE', "%$phrase%")
      ->latest()
      ->paginate(20);
    }
    
      
    $subtitle = 'Product <span>Search</span> Results';
    
    return view('home.products', compact('products', 'subtitle', 'phrase'));
  }


}
