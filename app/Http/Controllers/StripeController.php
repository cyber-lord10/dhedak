<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cart;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    
    public function checkout(Request $request)
    {
             
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $products = Cart::where('user_id', $request->uid)->get();
        
        if (!count($products)) {
          redirect(route('cart'));
        }
        
        $line_items = [];
        $total_price = 0;

        foreach ($products as $prod) 
        {

          $total_price += $prod->price;
          
          $line_items[] = [
            'price_data' => [
              'currency' => 'USD',
              'product_data' => [
                'name' => $prod->product_title,
                'images' => [
                  url('public/products/' . $prod->image),
                ],
                'description' => $prod->description,
              ],
              'unit_amount' => $prod->price * 100,
            ],
            'quantity' => $prod->product_quantity,
          ];
          
        } 

        
        try
        {
          $session = \Stripe\Checkout\Session::create([
          'line_items' => $line_items,
          'mode' => 'payment',
          'success_url' => route('checkout.success', [], true),
          'cancel_url' => route('checkout.cancel', [], true),
        ]);
        } catch (Exception $e) 
        {
          return redirect()->away(route('checkout.cancel', ['payment_error' => true]));
        }
        
        $invoice = new Invoice;
        $invoice->invoice_id = random_int(99, 100000);
        $invoice->user_id = $prod->user_id;
        $invoice->total = $total_price;
        
        $items = '';
        
        foreach ($products as $prod) {
          $subtotal = number_format($prod->product_quantity * $prod->price, 0, '', ',');
          $items .= $prod->product_quantity . " x " . $prod->product_title . ' = <b>$' . $subtotal . '</b>,, ';
          Cart::find($prod->id)->delete();          
        }

        $items = '<br>' . Str::beforeLast($items, ',,');
        $invoice->items = $items;
        $invoice->save(); 

        $total_price = '<br><div style="font-size:20px;">Total: <b>$' . $total_price . '</b></div>'; 
        $notifications = str_replace(',, ', '<br>', $items);
        $notifications .= $total_price;

        $invoiceNot = [
          'header' => 'Successful good payment, we\'ll let update you on your good\'s movement through out the delivery.<br>',
          'body' => $notifications,
          'btn-text' => 'Invoices',
          'btn-url' => url('/invoices'),
          'footer' => 'Thanks for purchasing with us, we promise to give you the best of our services, looking foward to see you again...<br>'
        ];
        $me = User::find(Auth::user()->id);
        $me->notify(new InvoicePaid($invoiceNot));

        return redirect()->away($session->url);

    }




    public function success()
    {
      $msg = '<h1 style="color:green;">Success!</h1>';
      return view('home.checkout.success', compact('msg'));
    }

    
    public function cancel()
    {
      $msg = '<h1 style="color:red;">Failure!</h1>';
      return view('home.checkout.cancel', compact('msg'));
    }

    
    public function invoices()
    {
      $invoices = Invoice::where('user_id', Auth::user()->id)->latest()->paginate(10);      
      return view('home.checkout.invoices', compact('invoices')); 
    }

    
    public function requestMail($id)
    {
      
      if ( !(Auth::check() && Auth::user()->id == Invoice::find($id)->user_id) ) {
        return redirect()->back();
      }
      
      $invoice = Invoice::find($id);
      $total_price = $invoice->total;
      
      $items = $invoice->items;
      $items = Str::beforeLast($items, ',,');
      $invoice->items = $items;

      $total_price = '<br><div style="font-size:20px; ">Total: <b>$' . number_format($total_price, 0, '', ',') . '</b></div>'; 
      $notifications = str_replace(',, ', '<br>', $items);
      $notifications .= $total_price;

      $invoiceNot = [
        'header' => 'Here is the invoice for your payment invoice.<br>',
        'body' => $notifications,
        'btn-text' => 'Invoices',
        'btn-url' => url('/invoices'),
        'footer' => 'Thanks for purchasing with us, we promise to give you the best of our services, looking foward to see you again...<br>'
      ];
      
      $me = User::find(Auth::user()->id);
      $me->notify(new InvoicePaid($invoiceNot));

      return redirect()->back()->with([
        'notification' => 'invoice email was successfully sent to ' . Auth::user()->email, 
        'color' => 'success',
        'object' => 'Your',
      ]);
  
    }



    
}
