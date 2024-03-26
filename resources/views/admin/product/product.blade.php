
    
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

                {{-- @dd($sub_section) --}}

                @if ($sub_section == 'add_product')

                <form action="{{url('/add_product')}}" class="my-border-radius mx-auto w-100 text-start border border-5 px-3 py-2 rounded" style="max-width: 400px;" method="POST" enctype="multipart/form-data">
                  
                <h2 class="text-center">Add Product</h2>

                
                @if (session()->has('message') && session()->has('used_category'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b style="color: inherit;">"{{session('used_category')}}"</b> {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                {{--@dd(session()->has('message'))--}}

                  @csrf

                  <div class="mb-3">
                    <label for="title" class="form-label text-secondary">Title</label>
                    <input type="text" class="form-control text-light" id="title" name="title" placeholder="Write title here..." required>
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label text-secondary">Description</label>
                    <textarea class="form-control text-light" id="description" name="description" placeholder="Write description here..." rows="5" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label text-secondary">Image</label>
                    <input type="file" class="form-control text-light" id="image" name="image" accept="image/*" required>
                  </div>


                  <div class="mb-3">

                    <div for="category" class="form-label text-secondary">Category</div>

                    @php $counter = 0; @endphp
                    @foreach($categories as $category)
                      @php $counter++ @endphp
                      <input type="radio" class="btn-check" value="{{$category->category_id}}" name="category" id="_{{$category->id}}" autocomplete="off" {{$counter==1?'checked':null}}>
                      <label class="btn btn-outline-secondary" for="_{{$category->id}}">
                        {{$category->category_name}}
                      </label>
                    @endforeach

                  </div>


                  <div class="mb-3">
                    <label for="quantity" class="form-label text-secondary">Quantity</label>
                    <input type="number" class="form-control text-light" id="quantity" name="quantity" placeholder="Write quantity here..." min="1" required>
                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label text-secondary">New price ($)</label>
                    <input type="number" class="form-control text-light" id="price" name="price" placeholder="Write price here..." min="1" required>
                  </div>
                  <div class="mb-3">
                    <label for="discount_price" class="form-label text-secondary">Discount ($)</label>
                    <input type="number" class="form-control text-light" id="discount_price" name="discount_price" placeholder="Write discount price here..." min="1" required>
                  </div>


                  <button type="submit" class="w-100 btn btn-success mb-2" style="height:40px;">
                    Add product
                  </button>

                </form>


                @else

                <h3 class="mt-4">Your products</h3>

                @if (session()->has('message') && session()->has('used_product'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b style="color: inherit;">"{{session('used_product')}}"</b> {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <div class=""  style="overflow-x: auto;">
                  <table class="table table-dark table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th>Product ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price ($)</th>
                        <th>Discount ($)</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $counter = 0; @endphp
                      @foreach ($data as $data)
                        @php $counter++ @endphp
                        <tr  title="{{$data->title}}">
                          <td scope="row">{{$counter}}</td>
                          <td>PI{{$data->product_id}}</td>
                          <td>{{$data->title}}</td>
                          <td>{{$data->description}}</td>
                          <td><img class="border border-light" src="{{$data->image}}" alt="{{$data->title}}" style="width: 100px; height:auto; border-radius: 0;"></td>
                          <td>{{$data->category}}</td>
                          <td>{{$data->quantity}}</td>
                          <td>{{$data->price}}</td>
                          <td>{{$data->discount_price}}</td>
                          <td>
                            <a onclick="return confirm('Are you sure you want to delete category?')" href="{{url('/delete_product', $data->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{url('/update_product', $data->id)}}" class="btn btn-success ms-2">Edit</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                

                @endif
                

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