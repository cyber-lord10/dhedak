

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


                <h3 class="mb-3">Change testimonial positions</h3>

                <form action="{{url('/admin/change_testimonial_position_confrim')}}" class="my-border-radius" style="width:100%;" method="POST" enctype="multipart/form-data">

                  @if (session()->has('message') && session()->has('used_testimonial'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('used_testimonial')}}"</b> 
                        {{session('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @if (session()->has('error') && session()->has('duplicate'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('duplicate')}}"</b> 
                        {{session('error')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @if (session()->has('message') && session()->has('activity'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {!! session('message') !!}
                      <b style="color: inherit;">
                        "{!! session('activity') !!}"
                      </b>                        
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @csrf

                  <div class="text-start">

                    {{-- <h4 class="text-center text-success underline">Positions</h4> --}}

                    @foreach ($positions as $pos)
                      <div class="row" style="text-align: left;">
                        <div class="col-4">
                          {{Str::ucfirst($pos->position_str)}}: 
                        </div>
                        <div class="col-8">
                          <select class="btn btn-danger p-1 mb-3 uppercase" {{--text-light bg-dark border border-light--}}
                                  name="_{{$pos->position_id}}" 
                                  id="_{{$pos->position_id}}" >
                            @foreach ($testimonials as $test)
                              <option value="{{$test->testimonial_id}}" 
                                      {{ 
                                        $pos->position_int == $test->position? 
                                        'selected' : null 
                                      }}>
                                {{App\Http\Controllers\AdminController::visualizeName($test->testifier_name, 18)}}
                              </option> 
                            @endforeach
                          </select>
                        </div>
                      </div>
                    @endforeach                
                    
                    <div class="text-center">
                      <button type="submit" class="form-control mb-2 mt-2 mx-auto bg-danger btn btn-danger" style="height:40px; max-width:400px;">
                        Create testimonial
                      </button>
                    </div>

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