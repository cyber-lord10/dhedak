

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


                <h3 class="">Update Testimonial</h3>

                <form action="{{url('/admin/testimonial/update_confirm')}}" class="my-border-radius mx-auto" style="max-width:400px;" method="POST" enctype="multipart/form-data">

                  @if (session()->has('message') && session()->has('used_testimonial'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('used_testimonial')}}"</b> {{session('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif


                  @csrf


                  <input name='id' value="{{$testimonial->id}}" hidden />


                  <div style="text-align: left;">
                    
                    <div class="text-start mb-3">
                      <x-label for="image" value="Image (optional):" />
                      
                      <div class="alert alert-info alert-dismissible fade show label-text" role="alert">
                        You can upload a new product image if u want to change the previous one <b class="label-text">OR</b> skip the image field if you want the previous product image to remain unchanged.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      
                      <input type="file" accept="image/*" class="form-control mb-2 me-0 text-light" style="height:40px;" name="image" id="image" autofocus/>
                      <label  class="form-label text-secondary">Previous image:</label>
                      <br>
                      <div class="text-center">
                        <img class="rounded-10px border border-success border-2" src="{{asset($testimonial->image)}}" alt="{{$testimonial->testifier_name}}" style="width:200px; height:auto; margin: auto;" /> 
                      </div>

                      @error('image')
                          <p class="text-danger">{{$message}}</p>
                      @enderror                      
                    </div>
                    
                    <div class="text-start mb-3">
                      <x-label for="testifier_name" value="Reviewer's name (*):" />
                      <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="testifier_name" id="testifier_name" placeholder="Input testifier/reviewer's name here..." value="{{$testimonial->testifier_name}}" required /> 
                      @error('testifier_name')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    
                    <div class="text-start mb-3">
                      <x-label for="testifier_occupation" value="Reviewer's occupation/company position (*):" />
                      <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="testifier_occupation" id="testifier_occupation" placeholder="Write occupation/position here..." value="{{$testimonial->testifier_occupation}}" required />
                      @error('testifier_occupation')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>

                    <div class="text-start mb-3">
                      <x-label for="testimonial" value="Review (*):" />
                      <textarea class="form-control mb-2 me-0 text-light" style="height:100px;" name="testimonial" id="testimonial" placeholder="Write the review..." required >{{$testimonial->testimonial}}</textarea>
                      @error('testimonial')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>

                    
                    <div class="text-start mb-3">
                      <p class="label-text">You can later change the review position at <a href="{{url('/admin/testimonial/change_testimonial_position')}}" class="underline text-warning">change position</a>.</p>
                    </div>
                                    
                    
                    <button type="submit" class="form-control mb-2 bg-danger btn btn-danger ms-0" style="height:40px;">
                      Update testimonial
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