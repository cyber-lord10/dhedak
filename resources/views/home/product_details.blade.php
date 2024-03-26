
<!-- START of #TOP# -->
<x-top />
<!-- END OF #BOTTOM# -->

    <!-- START of header -->
    @include('home.inc.header')
    <!--/ END of header section -->

    
    <!-- START of flash notification --> 
    @if (session()->has('notification'))   
      <x-notification :bgcolor="session('color')" :object="session('object')">
        {!! session('notification') !!}
      </x-notification>
    @endif
    <!--/ END of flash notification -->

    
  <!-- *START* PAGE SECTIONS -->
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="m-3">
          <img class="border border-danger w-100 rounded-10px" src="{{asset('products/'.$product->image)}}" alt="{{$product->title}}" title="{{$product->title}}">
        </div>
      </div>

      <div class="col-md-7">
        <p class="new-arrival text-center uppercase">new</p>
        <h2 class="capitalize">{{$product->title}}</h2>
        <p>Product id: <b>PI{{$product->product_id}}</b></p>
        <p>{{$product->description}}</p>
        <p class="old-price">Old price: <span class="line-through text-danger">${{$product->price + $product->discount_price}}</span></p>
        <p class="discount">Discount: <span class="text-success">${{$product->discount_price}}</span></p>
        <p class="price">USD ${{$product->price}}</p>
        <p><b>Availabilty:</b> <span class="text-danger">{{$product->quantity}}</span></p>
        <p><b>Condition:</b> <span class="text-danger">New</span></p>
        <p><b>Category:</b> <span class="capitalize text-danger">{{$product->category}}</span></p>
        <form class="m-0 p-0" action="{{url('add_to_cart', $product->id)}}" method="POST">
          @csrf
          <label class="" for="qty">Quantity:</label>
          <input class="shadow-sm border border-danger rounded" type="number" name="quantity" id="product-details-qty" value="1" min="1" />
          <button class="btn btn-danger" type="submit" value="add_to_cart">
            <i class="fa-solid fa-cart-plus"></i> Add to cart
          </button>
        </form>

        <div class="text-center my-2 OR-container" style="width: 340px;">                
          <div class="OR">{{ __('OR') }}</div>
        </div>

        <p class="text-muted mb-4">Jump straight to <a href="{{url('/cart')}}" class="underline text-danger">cart</a></p>

      </div>
    </div>
  </div>
  <!-- *END* PAGE SECTIONS -->

  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->
