    
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


                <h2 class="h2font">Delete Category</h2>
                <form action="{{url('/switch_category')}}" class="my-border-radius mx-auto w-100" style=" " method="POST">
                  
                  @if (session()->has('message') && session()->has('used_category'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('used_category')}}"</b> {{session('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @csrf

                  <div class="alert alert-info alert-dismissible fade show label-text text-start" role="alert">
                    <i class="label-text fa-solid fa-circle-info" style="font-size: 20px;"></i>
                    Oops! you can't delete the <b class="label-text">categories</b> that currently contains <b class="label-text">product(s)</b>, to <b class="label-text">delete it</b> you'll need to switch the the categories of products in possession/hold of the category you want to delete to a <b class="label-text">different one</b> from <a class="label-text underline fw-bolder" href="#del_products">below</a>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

                  <input type="hidden" name="id" value="{{$id}}">

                  <table class="table table-dark table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">New Category</th>
                      </tr>
                    </thead>
                    <tbody id="del_products">
                      @php $counter = 0; @endphp
                      @foreach ($products as $product)
                        @php $counter++; @endphp
                        <tr title="{{$product->title}}"> 
                          <td scope="row">{{$counter}}</td>
                          <td>
                            <img class="border border-light rounded-10px mb-2" src="{{asset('products/'.$product->image)}}" alt="{{$product->title}}" style="width: 100px; height:auto;" />
                            <h3 class="">{{$product->title}}</h3>
                            <p style="color:rgb(176, 183, 189);">Previous: <b>
                              {{$prev_cat}}</b></h3>
                          </td>
                          <td>
                            <select class="text-dark p-2" name="_{{$product->id}}">
                              @foreach ($categories as $cat) 
                                  <option class="text-dark p-2" value="{{$cat->category_id}}">
                                    {{$cat->category_name}}
                                  </option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="mt-5 text-start">
                    <p class="d-inline-block mb-3">After choosing new categories for products, you can now delete:</p>
                    <p class="d-inline-block">
                      <button class="btn btn-danger" type="submit">
                        <i class="mdi mdi-delete-forever"></i>
                        Delete category
                      </button>
                    </p>
                  </div>

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