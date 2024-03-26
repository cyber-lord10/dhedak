<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Position;
use App\Models\Testimonial;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdvertDocumentation;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

  // =============================== MY CUSTOMIZED FUNCTIONS ================================= //
  protected function catExist($cat_name): bool
  {
    $categories = Category::where('category_name', $cat_name)->get();
    if (count($categories) > 0) {
      return true;
    } else {
      return false;
    }
  }

  public static function visualizeName(string $name, int $desired_length): string
  {
    $namelen = Str::length($name);
    if ($namelen >= $desired_length) {
      $fullname = explode(' ', $name);
      if (count($fullname) == 1)
      {
        return last($fullname);
      }
      $name = $fullname[0] . ' ' . $fullname[1];
      if (Str::length($name) >= $desired_length) {
        $name = $fullname[0] . ' ' . $fullname[1][0] . '.';
      }
    }
    return $name;
  }


  public function arrHasDupes($arr) : bool
  {
    return count($arr) !== count(array_unique($arr));
  }

  
  public static function isAdmin() : bool
  {
    return Auth::check() && Auth::user()->usertype !== 0;    
  }

  public static function isSubAdmin() : bool
  {
    return Auth::check() && Auth::user()->usertype == 1;    
  }

  public static function isMasterAdmin() : bool
  {
    return Auth::check() && Auth::user()->usertype == 2;    
  }

  public static function isOwnerAdmin() : bool
  {
    return Auth::check() && Auth::user()->usertype == 3;    
  }

  public static function isHighAdmin() : bool
  {
    return Auth::check() && Auth::user()->usertype > 1;    
  }

  public static function isLessAdmin() : bool
  {
    return Auth::check() && Auth::user()->usertype < 3;    
  }










  // ==================================== CATEGORY ========================================== //

  public function viewCategory()
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $data = Category::all();
    return view('admin.category.category', compact('data'));
  }


  public function addCategory(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    if ($this->catExist($request->category)) {
      return redirect()->back()->with(['error' => 'already exist as a category, please use another name!', 'used_category' => trim(Str::lower($request->category))]);
    }

    $data = new Category;
    $category_id = random_int(99, 100000);
    $data->category_id = $category_id;
    $data->category_name = trim(Str::lower($request->category));

    $data->save();

    return redirect()->back()->with(['message' => 'was successfully added to Categories!', 'used_category' => trim(Str::lower($request->category))]);
  }


  public function deleteCategory($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $category = Category::find($id);
    $products = Product::all();
    $used_category = $category->category_name;

    $switches = [];
    foreach ($products as $prod) {
      if ($prod->category == $category->category_id) {
        $switches[] = $prod->id;
      }
    }

    if (count($switches) > 0) {
      $products = [];
      foreach ($switches as $switch) {
        $products[] = Product::find($switch);
      }

      $prev_cat = Category::where('category_id', $category->category_id)->first();
      $prev_cat = $prev_cat->category_name;
      $prev_cat = Str::ucfirst($prev_cat);

      $categories = Category::where('category_id', '!=', $category->category_id)->get();

      return view(
        'admin.category.switch_category',
        compact('products', 'categories', 'id', 'prev_cat')
      );
    }

    $category->delete();

    return redirect()->back()->with(['message' => 'was successfully deleted!', 'used_category' => $used_category]);
  }


  public function switchCategory(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $requestData = $request->except('_token', 'id');
    $category = Category::find($request->id);
    $category_name = $category->category_name;
    $category->delete();
    
    foreach ($requestData as $key => $req) {
      $reqID = Str::replaceFirst('_', '', $key);
      $product = Product::find($reqID);
      $product->category = $req;
      $product->save();
    }

    return redirect('/view_category')->with(['message' => 'was successfully deleted!', 'used_category' => $category_name]);
  }


  public function updateCategory($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $category = Category::find($id);
    return view('admin.category.update_category', compact('category'));
  }


  public function updateConfrimCategory(Request $request, $id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $category = Category::find($id);
    $category->category_name = $request->category;

    $category->save();

    return redirect('/view_category')->with(['message' => 'was successfully deleted!', 'used_category' => $request->name]);
  }



  // ===================================== PRODUCT ========================================== //

  public function product($sub_section)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    if ($sub_section == 'view_products') {
      $data = Product::latest()->get();
      foreach ($data as $dat) {
        $dat->category = Category::where('category_id', $dat->category)
          ->first()
          ->category_name;
      }
      return view('admin.product.product', compact('data', 'sub_section'));
    } elseif ($sub_section == 'add_product') {
      $categories = Category::all();
      return view('admin.product.product', compact('sub_section', 'categories'));
    }
  }


  public function addProduct(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $product = new Product;

    $product_id = random_int(99, 100000);

    $product->product_id = $product_id;
    $product->title = trim(Str::lower($request->title));
    $product->description = trim(Str::lower($request->description));
    $product->category = trim(Str::lower($request->category));
    $product->price = trim(Str::lower($request->price));
    $product->quantity = trim(Str::lower($request->quantity));
    $product->discount_price = trim(Str::lower($request->discount_price));

    $image = $request->image;
    $img_name = time() . '.' . $image->getClientOriginalExtension();
    $image->move('products', $img_name);
    $product->image = $img_name;

    $product->save();

    return redirect()->back()->with(['message' => 'was successfully added to Products!', 'used_category' => trim(Str::lower($product->title))]);
  }


  public function deleteProduct($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $data = Product::find($id);
    $used_product = $data->title;
    $image_path = public_path('products/' . $data->image);
    if (file_exists($image_path)) {
      unlink($image_path);
    }

    $data->delete();

    return redirect()->back()->with(['message' => 'was successfully deleted!', 'used_product' => $used_product]);
  }


  public function updateProduct($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $product = Product::find($id);
    $categories = Category::all();

    return view('admin.product.update_product', compact('product', 'categories'));
  }


  public function updateProductUpdate(Request $request, $id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $product = Product::find($id);

    $product->title = trim(Str::lower($request->title));
    $product->description = trim(Str::lower($request->description));
    $product->category = trim(Str::lower($request->category));
    $product->price = trim(Str::lower($request->price));
    $product->quantity = trim(Str::lower($request->quantity));
    $product->discount_price = trim(Str::lower($request->discount_price));

    if ($request->image) 
    {
      if (file_exists(public_path('products/' . $product->image))) {
        unlink(public_path('products/' . $product->image));
      }
      $image = $request->image;
      $img_name = time() . '.' . $image->getClientOriginalExtension();
      $image->move('products', $img_name);
      $product->image = $img_name;
    }

    $product->save();

    return redirect()->back()->with(['message' => 'product was successfully updated!', 'used_product' => trim(Str::lower($request->category))]);
  }



  // ======================================= CONTACT ================================= //

  public function adminContact()
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $contacts = Contact::orderBy('position', 'asc')->get();
    return view('admin.contact.contact', compact('contacts'));
  }


  public function adminAddContact(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $contact = new Contact;
    $contact_id = random_int(99, 100000);

    $contact->contact_id = $contact_id;
    $contact->info = trim($request->contact_info);
    $contact->value = trim($request->contact_value);
    $contact->position = trim($request->position);

    $contact->save();

    return redirect()->back()->with(['message' => 'was successfully created!', 'used_contact_info' => trim(Str::lower($request->contact_info))]);
  }


  public function deleteContactInfo($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $contact = Contact::find($id);
    $contact_info = $contact->info;
    $contact->delete();

    return redirect()->back()->with(['message' => 'was successfully deleted!', 'used_contact_info' => $contact_info]);
  }


  public function adminUpdateContact($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $contact = Contact::find($id);
    return view('admin.contact.contact_update', compact('contact'));
  }


  public function adminUpdateConfirmContact(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $contact = Contact::find($request->id);

    $contact->info = trim($request->contact_info);
    $contact->value = trim($request->contact_value);
    $contact->position = trim($request->position);

    $contact->save();

    return redirect('/admin/contact')->with(['message' => 'was successfully updated!', 'used_contact_info' => $request->contact_info]);
  }



  // ============================= ADVERT =============================================== /


  public function adminAdvert($sub_section)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    if ($sub_section == 'view_adverts') {
      $adverts = Banner::all();
      return view('admin.advert.view_adverts', compact('adverts'));
    } elseif ($sub_section == 'add_advert') {
      return view('admin.advert.add_advert');
    }
  }

  public function adminAddAdvert(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $banner = new Banner;
    $banner_id = random_int(99, 100000);

    $banner->banner_id = $banner_id;
    $banner->title = trim(Str::lower($request->title));
    $banner->subtitle = trim(Str::lower($request->subtitle));
    $banner->text = trim(Str::lower($request->text));
    $banner->href = trim(Str::lower($request->href));
    $banner->link_text = trim(Str::lower($request->link_text));

    $banner->save();

    return redirect()->back()->with(['message' => 'was successfully created!', 'used_advert' => trim(Str::lower($request->title))]);
  }


  public function deleteAdvert($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $banner = Banner::find($id);
    $banner_title = $banner->title;
    $banner->delete();
    return redirect()->back()->with(['message' => 'was successfully deleted!', 'used_advert' => trim(Str::lower($banner_title))]);
  }


  public function adminUpdateAdvert($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $banner = Banner::find($id);
    return view('admin.advert.advert_update', compact('banner'));
  }


  public function adminUpdateConfirmAdvert(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $banner = Banner::find($request->id);

    $banner->title = trim(Str::lower($request->title));
    $banner->subtitle = trim(Str::lower($request->subtitle));
    $banner->text = trim(Str::lower($request->text));
    $banner->href = trim(Str::lower($request->href));
    $banner->link_text = trim(Str::lower($request->link_text));

    $banner->save();

    return redirect()->back()->with(['message' => 'was successfully updated!', 'used_advert' => trim(Str::lower($request->title))]);
  }


  public function adminAdvertDocumentation()
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $advert_documentations = AdvertDocumentation::all();
    return view('admin.advert.documentation' , compact('advert_documentations')); 

  }




  // ========================================= TESTIMONIAL =============================== //

  public function adminTestimonial($sub_section)
  {
    if ( !$this->isAdmin() ) return redirect()->back();


    if ($sub_section == 'view_testimonials') {
      $testimonials = Testimonial::orderBy('position', 'asc')->get();
      return view('admin.testimonial.view_testimonials', compact('testimonials'));
    } elseif ($sub_section == 'add_testimonial') {

      $testimonials = Testimonial::orderBy('position', 'asc')->get();

      $positions = [];

      if (count($testimonials) > 0) {
        array_push($positions, 'before ' . str::upper($testimonials[0]->testifier_name));

        foreach ($testimonials as $key => $value) {
          array_push($positions, 'after ' . str::upper($value->testifier_name));
        }

        return view('admin.testimonial.add_testimonial', compact('positions'));
      }

      return view('admin.testimonial.add_testimonial');
    }
  }



  public function adminAddTestimonial(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();


    if ( count(Testimonial::all()) >= 10) 
    { 
      return redirect()->back()->with([
        'reorder_failed' => 'Oops! Too <b style="color: inherit;">many</b> testimonials!<br> <b style="color: inherit;">(maximum = 20)</b>'
      ]);
    } 

    $testimonial = new Testimonial;
    $testimonial_id = random_int(99, 100000);

    $testimonial->testimonial_id = $testimonial_id;
    $testimonial->testifier_name = trim(Str::lower($request->testifier_name));
    $testimonial->testifier_occupation = trim(Str::lower($request->testifier_occupation));
    $testimonial->testimonial = trim(Str::lower($request->testimonial));
    $testimonial->position = (int)$request->position;

    // Position determination and identification section 
    $existing_testimonials_positions = Testimonial::orderBy('position', 'asc')->get();

    if ($testimonial->position === 1) {
      foreach ($existing_testimonials_positions as $etp) {
        $etp->position++;
        $etp->save();
      }
    } else {
      foreach ($existing_testimonials_positions as $etp) {
        if ($etp->position >=  $testimonial->position) {
          $etp->position++;
          $etp->save();
        }
      }
    }

    $image = $request->image;
    $testifier = str::replace(' ', '_', $testimonial->testifier_name);
    $img_name = $testifier . '.' . $image->getClientOriginalExtension();
    $image->move('general-images/testimonials', $img_name);
    $testimonial->image = 'general-images/testimonials/' . $img_name;

    $testimonial->save();

    return redirect()->back()->with(['message' => '\'s review/testimonial was successfully created!', 'used_testimonial' => trim(Str::lower($request->testifier_name))]);
  }



  public function deleteTestimonial($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $testimonial = Testimonial::find($id);
    $testimonial_name = $testimonial->testifier_name;
    $image = public_path($testimonial->image);
    if (file_exists($image)) unlink($image);
    $testimonials = Testimonial::all();
    foreach ($testimonials as $test) {
      if ($test->position > $testimonial->position) {
        $test->position--;
        $test->save();
      }
    }
    $testimonial->delete();
    return redirect()->back()->with(['message' => '\'s testimonial/review was successfully deleted!', 'used_testimonial' => trim(Str::lower($testimonial_name))]);
  }



  public function adminUpdateTestimonial($id)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $testimonial = Testimonial::find($id);
    $testimonials = DB::select('SELECT * FROM testimonials WHERE testifier_name <> ?', [$testimonial->testifier_name]);

    $positions = [];

    if (count($testimonials) > 0) {
      array_push($positions, 'before ' . str::upper($testimonials[0]->testifier_name));
      foreach ($testimonials as $value) {
        array_push($positions, 'after ' . str::upper($value->testifier_name));
      }

      return view('admin.testimonial.testimonial_update', compact('testimonial', 'positions'));
    }

    return view('admin.testimonial.testimonial_update', compact('testimonial'));
  }



  public function adminUpdateConfirmTestimonial(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $testimonial = Testimonial::find($request->id);

    $old_img = $testimonial->image;

    $testimonial->testifier_name = trim(Str::lower($request->testifier_name));
    $testimonial->testifier_occupation = trim(Str::lower($request->testifier_occupation));
    $testimonial->testimonial = trim(Str::lower($request->testimonial));

    $testifier_name = Str::replace(' ', '_', $testimonial->testifier_name);

    $image_target = 'general-images/testimonials/';

    # Check if the image was changed or was set to initial/previous
    if ($request->image) {
      if (file_exists(public_path($testimonial->image))) {
        unlink(public_path($testimonial->image));
      }

      $image = $request->image;
      $image_name = $testifier_name . '.' . $image->getClientOriginalExtension();
      $image->move($image_target, $image_name);
      $testimonial->image = $image_target . $image_name;
    } else 
    {
      $ext = Str::afterLast($old_img, '.');
      $new_img = $image_target . $testifier_name . '.' . $ext;
      rename(
        public_path($old_img),
        public_path($new_img)
      );
      $testimonial->image = $new_img;
    }

    $testimonial->save();

    return redirect()->back()->with(['message' => 'was successfully updated!', 'used_testimonial' => trim(Str::lower($testimonial->testifier_name))]);
  }



  public function changeTestimonialPosition()
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    $testimonials = Testimonial::orderBy('position', 'asc')->get();
    $num_test = count($testimonials);
    $positions = Position::limit($num_test)->get();

    return view(
      'admin.testimonial.change_position',
      compact('positions', 'testimonials', 'num_test')
    );
  }



  public function changeTestimonialPositionConfirm(Request $request)
  {
    if ( !$this->isAdmin() ) return redirect()->back();

    echo $request->id;

    $requestData = $request->except('_token', 'id');
    if ($this->arrHasDupes($requestData)) 
    {
      $dupes = array_diff_assoc($requestData, array_unique($requestData));
      $testf_name = Testimonial::where('testimonial_id', Arr::first($dupes))
                                      ->first()
                                      ->testifier_name; 

      return redirect()->back()->with([
        'error' => 'was *duplicated*!', 
        'duplicate' => trim(Str::lower($testf_name)),
        'dupes' => $dupes
      ]);
    }
    foreach ($requestData as $position_id => $testimonial_id) 
    {
    }

    return redirect()->back()->with([
      'message' => '<b style="color:inherit;">Positions</b> were successfully',
      'activity' => 'perfectly re-ordered!'
    ]);

  }



  public function admin()
  {

    if ( !$this->isAdmin() ) return redirect()->back();

    $admins = User::where('usertype', '!=', 0)->get(['id', 'name', 'email', 'usertype']);
    $clients = User::where('usertype', 0)->get(['id', 'name']);
    
    return view('admin.admin.admin', compact('admins', 'clients'));
    
  }


  public function addAdmin(Request $request)
  {    
    $owner = User::find($request->id);
    if ( !$this->isHighAdmin() || ($owner && $owner->usertype > 2) ) 
    {
      return redirect()->back()->with([ 
        'warn_msg' => 'can\'t be modified, because it\'s an owner admin account', 
        'used_admin' => $request->email,
      ]);
    }
    
    $user = User::find($request->id);
    $user->usertype = 1;
    $user->save();
    
    return redirect()->back()->with([ 
      'message' => 'was successfully made an admin!', 
      'used_admin' => trim(Str::lower($user->email))
    ]);
    
  } 


  public function removeAdmin($id)
  {
    $owner = User::find($id);
    if ( !$this->isHighAdmin() || ($owner && $owner->usertype > 2) ) 
    {
      return redirect()->back()->with([ 
        'warn_msg' => 'can\'t be modified, because it\'s an owner admin account', 
        'used_admin' => $owner->email,
      ]);
    }
    
    if ($admin = User::find($id)) 
    {
      if (!$admin->password) 
      {
        $admin ->delete();
      } else 
      {
        $admin->usertype = 0;
        $admin->save();
      }
    }
    
    
    return redirect()->back()->with([ 
      'message' => 'was successfully removed!', 
      'used_admin' => trim(Str::lower($admin->email))
    ]);
    
  }

  
  public function makeMasterAdmin($id)
  {    
    $owner = User::find($id);
    if ( !$this->isHighAdmin() || ($owner && $owner->usertype > 2) ) 
    {
      return redirect()->back()->with([ 
        'warn_msg' => 'can\'t be modified, because it\'s an owner admin account', 
        'used_admin' => $owner->email,
      ]);
    }
  
    if ($admin = User::find($id)) 
    {
      $admin->usertype = 2;
      $admin->save();
    }
        
    return redirect()->back()->with([ 
      'message' => 'is now a MASTER ADMIN!', 
      'used_admin' => trim(Str::lower($admin->email))
    ]);
    
  }


  public function removeMasterAdmin($id)
  {
    $owner = User::find($id);
    if ( !$this->isHighAdmin() || ($owner && $owner->usertype > 2) ) 
    {
      return redirect()->back()->with([ 
        'warn_msg' => 'can\'t be modified, because it\'s an owner admin account', 
        'used_admin' => $owner->email,
      ]);
    }
    
    if ($admin = User::find($id)) 
    {
      $admin->usertype = 1;
      $admin->save();
    }
        
    return redirect()->back()->with([ 
      'message' => 'was successfully removed/dropped to SUB ADMIN!', 
      'used_admin' => trim(Str::lower($admin->email))
    ]);
    
  }



  public function dropSelf()
  {
    $id = Auth::user()->id;
    $owner = User::find($id);
    if ( !$this->isAdmin() || ($owner && $owner->usertype > 2) ) 
    {
      return redirect()->back()->with([ 
        'warn_msg' => 'can\'t be modified, because it\'s an owner admin account', 
        'used_admin' => $owner->email
      ]);
    }
    
    if ($current = User::find($id)) 
    {
      $current->usertype = 0;
      $current->save();
    }
        
    return redirect(route('user-home'))->with([ 
      'notification' => 'were successfully removed/dropped from being an admin!', 
      'object' => 'You',
      'color' => 'success'
    ]);
    
  }

  
  public function dropSelfMaster() 
  {
    $id = Auth::user()->id;
    $owner = User::find($id);
    if ( !$this->isAdmin() || ($owner && $owner->usertype > 2) ) 
    {
      return redirect()->back()->with([ 
        'warn_msg' => 'can\'t be modified, because it\'s an owner admin account', 
        'used_admin' => $owner->email
      ]);
    }
    
    if ($current = User::find($id)) 
    {
      $current->usertype = 1;
      $current->save();
    }
        
    return redirect(url('/admins'))->with([ 
      'notification' => 'were successfully dropped from being a MASTER ADMIN!', 
      'object' => 'You',
      'color' => 'success'
    ]);
    
  }
  



}
