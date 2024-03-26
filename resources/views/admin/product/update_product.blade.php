
    
    {{-- START of #TOP# --}}
    @include('admin.inc.header')
    {{-- END of #TOP# --}}

      <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.partials._sidebar')


        <!-- partial -->
        <div class="container-fluid page-body-wrapper"> {{--  --}}
          
          @include('admin.partials._partial2')

          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
              
              <div class="div_center" >

                <form action="{{url('/update_product/update', $product->id)}}" class="my-border-radius mx-auto w-100 text-start border border-5 px-3 py-2 rounded" style="max-width: 400px;" method="POST" enctype="multipart/form-data">
                  
                <h2 class="text-center">Edit Product</h2>

                
                @if (session()->has('message') && session()->has('used_category'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b style="color: inherit;">"{{session('used_category')}}"</b> {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                {{--@dd(session()->has('message'))--}}

                  @csrf

                  <div class="mb-3">
                    <label for="title" class="form-label text-secondary">Title (*)</label>
                    <input type="text" class="form-control text-light" id="title" name="title" placeholder="Write title here..." value="{{$product->title}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label text-secondary">Description (*)</label>
                    <textarea class="form-control text-light" id="description" name="description" placeholder="Write description here..." rows="5" required>
                      {{$product->description}}
                    </textarea>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label text-secondary">Image (optional)</label>
                    <input type="file" class="form-control text-light" id="image" name="image" accept="image/*">

                    <label  class="form-label text-secondary">Previous image</label>
                    <br>
                    <div class="text-center">
                      <img class="rounded-10px border border-success border-2" src="{{asset('products/'.$product->image)}}" alt="{{$product->title}}" style="width:200px; height:auto; margin: auto;" />
                    </div>                    
                  </div>


                  <div class="mb-3">

                    <div for="category" class="form-label text-secondary">Category (*)</div>

                    @foreach($categories as $category)
                      <input type="radio" class="btn-check" value="{{$category->category_id}}" name="category" id="_{{$category->id}}" autocomplete="off" {{$category->category_id==$product->category?'checked':null}}>
                      <label class="btn btn-outline-secondary" for="_{{$category->id}}">
                        {{$category->category_name}}
                      </label>
                    @endforeach

                  </div>


                  <div class="mb-3">
                    <label for="quantity" class="form-label text-secondary">Quantity (*)</label>
                    <input type="number" class="form-control text-light" id="quantity" name="quantity" placeholder="Write quantity here..." min="1" value="{{$product->quantity}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label text-secondary">Price (*)</label>
                    <input type="number" class="form-control text-light" id="price" name="price" placeholder="Write price here..." min="1" value="{{$product->price}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="discount_price" class="form-label text-secondary">Discount price (*)</label>
                    <input type="number" class="form-control text-light" id="discount_price" name="discount_price" placeholder="Write discount price here..." min="1" value="{{$product->discount_price}}" required>
                  </div>


                  <button type="submit" class="w-100 btn btn-success mb-2" style="height:40px;">
                    Edit product
                  </button>

                </form>
                

              </div>
                
              
              
              
              
                <!-- partial:partials/_footer.html -->
                @include('admin.partials._footer')
                <!-- partial --> 
            
            </div>
            <!-- content-wrapper ends --->            
            </div>
            <!-- main-panel ends -->
          </div>
        <!-- page-body-wrapper ends -->
    
      </div>

    {{-- START of #TOP# --}}
    @include('admin.inc.footer')
    {{-- END of #TOP# --}}