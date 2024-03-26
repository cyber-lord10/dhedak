
    
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

                <h3 class="mt-4">View Testimonials/Reviews</h3>

                <div class="" style="overflow-x: auto;">

                  @if (session()->has('message') && session()->has('used_testimonial'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('used_testimonial')}}"</b> {{session('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  
                  <table class="table table-dark table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Occupation</th>
                        <th scope="col" style="width:200px;">Testimonial</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $counter = 0; @endphp
                      @foreach ($testimonials as $testimonial)
                        @php $counter++; @endphp
                        <tr title="{{$testimonial->title}}">
                          <td scope="row">{{$counter}}</td>
                          <td><img src="{{asset($testimonial->image)}}" /></td>
                          <td>{{$testimonial->testifier_name}}</td> 
                          <td>{{$testimonial->testifier_occupation}}</td>
                          <td style="width:200px;">{{$testimonial->testimonial}}</td>
                          <td class="capitalize">{{$testimonial->link_text}}</td>
                          <td>
                            <a onclick="return confirm('Are you sure you want to delete testimonial?')" href="{{url('/delete_testimonial', $testimonial->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{ url('/admin/testimonial/update', $testimonial->id) }}" class="btn btn-success ms-2">Edit</a>
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