
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

  

  <!-- PAGE SECTION -->

  <div class="container">

    {{-- Alert section --}}
    @if ($carts->count())
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-bell me-1"></i>To checkout, please <b>scroll</b> down or <a href="#checkout" class="alert-link underline">click here!</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif


      <div class="row"  style=""> <!-- id="cart-table-head" -->
        <div class="col-8 text-center text-light bg-danger px-2 py-4">Product</div>
        <div class="col-4 text-center text-light bg-danger px-2 py-4">Drop</div>
      </div>

      @php $total = 0; @endphp

      @forelse ($carts as $cart)

        @php $total += $cart->total; @endphp

        {{-- <tr class="border border-top pt-3" style="border-top: 1.5px solid rgb(230, 167, 167) !important;"> <!-- rgb(223, 19, 19) --> --}}

        <div class="row border border-danger">

          <div class="col-8 pt-3" >
            <div class="cart-info w-100">
              <img  class="border border-danger mx-auto rounded-10px" src="{{asset('products/'.$cart->image)}}" alt="{{$cart->product_title}}" title="{{$cart->prodcut_title}}" style="width:80px; height:auto;">
              <div class="mt-2 text-center">
                <p class="capitalize mb-0"><b>{{$cart->product_title}}</b></p>
                <small class="fs-5 d-inline-block mt-2">
                  Price: <b class="fw-bold">
                  ${{number_format($cart->price, 0, '', ',')}}</b> 
                </small><br> 
                <small class="fs-5 d-inline-block mt-2" id="subtotal">
                  Subtotal: <b class="text-danger">
                  ${{number_format($cart->total, 0, '', ',')}}</b> 
                </small> 
                <div class="text-center justify-content-center">
                  <form class="mt-3 pt-0 mx-auto text d-block" action="{{route('update-cart-item', $cart->id)}}" method="POST">
                    @csrf
                    <div class="input-group mx-auto" style="width:170px;">
                      <input type="number" class="text-center border border-danger" value="{{$cart->product_quantity}}" min="1" name="quantity" placeholder="Qty" aria-label="Recipient's username" aria-describedby="button-addon2" style="width: 80px; border-radius: 50rem 0 0 50rem; height: 2.75rem;">
      
                      <button type="submit" class="btn btn-danger bg-danger text-light input-group-text text-center" style="width: 80px; border-radius: 0 50rem 50rem 0; font-size: 1rem; height: 2.75rem;" name="add_to_cart" type="submit" id="button-addon2">
                        <i class="fa-solid fa-pencil mx-auto me-1" style="margin-right: 3px;"></i>
                      </button>
                    </div>
                  </form>
                </div>
                
              </div>
              
            </div>
          </div>
          <div class="col-4 pt-5 text-center">
            <a onclick='return confirm("Are you sure you want to drop item?")' href="{{url('remove_cart_item', $cart->id)}}" class="btn btn-danger mt-5 btn-lg">
              <i class="fa-regular fa-trash-can"></i> Drop
            </a>
          </div>
        </div>

      @empty
        <div class="border border-danger text-danger text-center p-4 mt-4" style="background-color:rgb(249, 227, 227) ">
          No item in cart, you can <b><a href="{{url('/product')}}" class="underline text-danger">shop here</a></b>
        </div>
      @endforelse

      @php 
        $tax = $total * (3 / 2) / 100 ; 
        $final_total = $total + $tax; 
      @endphp

    </table>

    @if ($carts->count())
      <div id="checkout" class="total-price">
        <table class="table">
          <tr>
            <td>Total</td>
            <td><b>$ {{number_format($total, 0 , '', ',')}}</b></td>
          </tr>
          <tr>
            <td>Tax</td>
            <td><b>$ 0</b></td> {{-- {{number_format($tax, 0 , '', ',')}} --}}
          </tr>
          <tr style="width:100%; height: 12px;">
            
          </tr>
          <tr>
            <td>Final total</td>
            <td class="text-danger p-2" style="border:1px solid red; ">
              <b>$ {{number_format($final_total, 0 , '', ',')}}</b>
            </td>
            <tr>
              <td colspan="2" class="">

                <a href="{{url('product')}}" class="btn btn-danger form-control mb-3 mt-2">
                  <i class="fa-solid fa-arrow-left"></i>
                  Continue shopping
                </a>
                
                
                <form class="m-0 p-0" action="{{route('checkout')}}" method="post">
                  @csrf
                  <input type="hidden" name="final_total" value="{{$final_total}}">
                  <input type="hidden" name="uid" value="{{Auth::user()->id}}">
                  <button class="btn btn-success mx-auto form-control" type="submit" name="checkout">
                    <i class="fa-solid fa-credit-card me-1"></i> Checkout
                  </button>
                </form>

              </td>            
          </tr>
        </table>
      </div>
    @endif


  <!--/ PAGE SECTION -->

</div>
      
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->
