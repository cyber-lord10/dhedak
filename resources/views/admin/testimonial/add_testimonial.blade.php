

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


                <h3 class="">Create Testimonial</h3>

                <form action="{{url('/admin/testimonial/add')}}" class="my-border-radius mx-auto" style="max-width:400px;" method="POST" enctype="multipart/form-data">

                  @if (session()->has('message') && session()->has('used_testimonial'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('used_testimonial')}}"</b> 
                        {{session('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @if (session()->has('reorder_failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {!! session('reorder_failed') !!}                       
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @csrf

                  <div class="text-start" style="text-align: left;">
                    
                    <div class="mb-3">
                      <x-label for="image" value="Image (*):"/>
                      <input type="file" accept="image/*" class="form-control mb-2 me-0 text-light" style="height:40px;" name="image" id="image" required autofocus/>
                      @error('image')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    
                    <div class="text-start mb-3">
                      <x-label for="testifier_name" value="Reviewer's name (*):" />
                      <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="testifier_name" id="testifier_name" placeholder="Input testifier/reviewer's name here..." value="{{old('testifier_name')}}" required /> 
                      @error('testifier_name')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    
                    <div class="text-start mb-3">
                      <x-label for="testifier_occupation" value="Reviewer's occupation/company position (*):" />
                      <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="testifier_occupation" id="testifier_occupation" placeholder="Write occupation/position here..." value="{{old('testifier_occupation')}}" required />
                      @error('testifier_occupation')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>

                    <div class="text-start mb-3">
                      <x-label for="testimonial" value="Review (*):" />
                      <textarea class="form-control mb-2 me-0 text-light" style="height:100px;" name="testimonial" id="testimonial" placeholder="Write the review..." required >{{old('testimonial')}}</textarea>
                      @error('testimonial')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>

                    @if (count($positions) > 1)
                      <div class="text-start mb-3">
                        <x-label for="position" value="Position: (*)" />
                        <select class="form-control mb-2 me-0 text-light" style="height:40px;" name="position" id="position" value="{{old('position')}}" required >
                          @foreach ($positions as $key => $value)
                            <option class="" value="{{$key+1}}">
                              {{Illuminate\Support\Str::ucfirst($value)}}
                            </option>
                          @endforeach
                        </select>
                        @error('position')
                          <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    @endif                    
                    
                    <button type="submit" class="form-control mb-2 bg-danger btn btn-danger ms-0" style="height:40px;">
                      Create testimonial
                    </button>

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