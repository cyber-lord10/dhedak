


<!-- product section -->
<section class="product_section layout_padding">
  <div class="container">
     <div class="heading_container heading_center">
        <h2>
           Our <span>products</span>
        </h2>
     </div>

     <div class="row">
      @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-4">
           <div class="box" title="{{$product->title}}">
              <div class="option_container">
                 <div class="options">
                    <a href="{{url('product_details',$product->product_id)}}" class="option1" title="View details on {{$product->title}}">Details</a>
                    
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
                 <img src="{{asset('products/'.$product->image)}}" alt="">
              </div>
              <div class="detail-box">
                 <h5>{{$product->title}}</h5>
                 <h6><span class="text-danger" style="text-decoration:line-through;">${{$product->price + $product->discount_price}}</span> / ${{$product->price}}</h6>
              </div>
           </div>
        </div>
        @endforeach
     </div>    
     
     <div class="btn-box">
        <a href="{{url('/product')}}">
        View All Products
        </a>
     </div>
  </div>
</section>
<!-- end product section -->