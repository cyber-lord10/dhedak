    
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


                <h2 class="h2font">Update Category</h2>
                <form action="{{url('/update_category/update', $category->id)}}" class="my-border-radius mx-auto w-100" style=" " method="POST">

                  @csrf

                  <div class="text-center">
                    <input type="text" class="me-0 text-dark" style="width:calc(100% - 90px); height:40px;" name="category" id="category" placeholder="Write new category name" value="{{$category->category_name}}"/>
                    <button type="submit" class="btn btn-danger ms-0" style="height:40px;">Update</button>
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