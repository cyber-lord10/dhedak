
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

  
  <!-- PAGE SECTIONS -->

    
    <!-- START of PRODUCTS-SECTION -->    
    <section class="product_section layout_padding">
      <div class="container">
         
        <!-- SUBTITLE-SECTION inclusion -->
        <x-sections.subtitle :subtitle="$subtitle"/>


          @unless (count($products) == 0)


              <div class="row">
                @foreach ($products as $product)
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box" title="{{$product->title}}">
                        <div class="option_container">
                          <div class="options">
                            <a href="{{url('product_details', $product->product_id)}}" class="option1">Details</a>
                            
                            <form class="m-0 p-0 w-100" action="{{route('add-to-cart')}}" method="post">
                              @csrf
                              <div class="input-group">

                                <input type="hidden" name="pid" value="{{$product->id}}">

                                <input type="number" class="rounded-pill-start rounded-end-0 text-center" value="1" min="1" name="quantity" placeholder="Qty" aria-label="Recipient's username" aria-describedby="button-addon2" style="width: 80px; border-radius: 50rem 0 0 50rem; height: 2.75rem;">
        
                                <button class="option2 input-group-text text-center" style="width: 80px; border-radius: 0 50rem 50rem 0; font-size: 1rem; height: 2.75rem;" name="add_to_cart" type="submit" id="button-addon2">
                                  <i class="fa-solid fa-cart-plus mx-auto"></i>
                                </button>
                              </div>
                            </form> 
        
                        </div>
                      </div>
                      <div class="img-box">
                        <img src="{{asset('products/'.$product->image)}}" 
                            alt="Old image of {{$product->title}}" />
                      </div>
                      <div class="detail-box">
                        <h5>{{$product->title}}</h5>
                        <h6><span class="text-danger" style="text-decoration:line-through;">${{$product->price + $product->discount_price}}</span> / ${{$product->price}}</h6>
                      </div>
                  </div>
                </div>
                @endforeach
              </div>

            <div class="mt-3">
              {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>


          @else


            <div class="text-center bg-red-100 text-red-500 p-5 text-lg">
              No match found!
            </div>


          @endunless

          

      </div>
    </section>
    <!--/ END of PRODUCTS-SECTION -->


    
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->
