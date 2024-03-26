    
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

                <h3 class="mt-4">View testimonial</h3>

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
                        <th scope="col">Reviewer</th>
                        <th scope="col">Name</th>
                        <th scope="col">Occupation</th>
                        <th scope="col">Review</th>
                        <th scope="col">Button text</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $counter = 0; @endphp
                      @foreach ($adverts as $advert)
                        @php $counter++ @endphp
                        <tr title="{{$advert->title}}">
                          <td scope="row">{{$counter}}</td>
                          <td>{{$advert->title}}</td>
                          <td>{{$advert->subtitle}}</td>
                          <td>{{$advert->text}}</td>
                          <td>{{$advert->href}}</td>
                          <td class="capitalize">{{$advert->link_text}}</td>
                          <td>
                            <a onclick="return confirm('Are you sure you want to delete category?')" href="{{url('/delete_advert', $advert->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{ url('/admin/advert/update', $advert->id) }}" class="btn btn-success ms-2">Edit</a>
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