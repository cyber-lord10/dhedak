    
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


                <h2 class="h2font">Add Category</h2>
                <form action="{{url('/add_category')}}" class="my-border-radius mx-auto w-100" style=" " method="POST">
                 
                  @if (session()->has('message') && session()->has('used_category'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('used_category')}}"</b> 
                        {{session('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @if (session()->has('error') && session()->has('used_category'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="label-text fa-solid fa-circle-info" style="font-size: 20px;"></i>
                      <b style="color: inherit;">"{{session('used_category')}}"</b> 
                        {{session('error')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @csrf

                  <div class="text-center">
                    <input type="text" class="me-0 text-dark" style="width:calc(100% - 60px); height:40px;" name="category" id="category" placeholder="Write new category name"/>
                    <button type="submit" class="btn btn-danger ms-0" style="height:40px;">Add</button>
                  </div>

                </form>

                <h3 class="mt-4">Your categories</h3>

                <div class="" style="overflow-x: auto;">
                  <table class="table table-dark table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $counter = 0; @endphp
                      @foreach ($data as $data)
                        @php $counter++ @endphp
                        <tr title="{{$data->category_name}}">
                          <td scope="row">{{$counter}}</td>
                          <td>{{$data->category_name}}</td>
                          <td>
                            <a onclick="return confirm('Are you sure you want to delete category?')" href="{{url('/delete_category', $data->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{url('/update_category', $data->id)}}" class="btn btn-success ms-2">Edit</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                

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