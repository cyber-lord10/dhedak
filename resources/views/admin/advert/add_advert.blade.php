
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


                <h3 class="">Add Adverts</h3>

                <form action="{{url('/admin/advert/add')}}" class="my-border-radius mx-auto" style="max-width:400px;" method="POST">

                  @if (session()->has('message') && session()->has('used_advert'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('used_advert')}}"</b> {{session('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @csrf

                  <div class="text-center">
                    
                    <div class="text-start">
                      <x-label for="title" value="Title of advert:" />
                      <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="title" id="title" placeholder="Write title of advert..." required autofocus/>
                    </div>
                    
                    <div class="text-start">
                      <x-label for="subtitle" value="Subtitle of advert:" />
                      <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="subtitle" id="subtitle" placeholder="The text displayed under title..." required />
                    </div>
                    
                    <div class="text-start">
                      <x-label for="text" value="Banner body:" />
                      <textarea class="form-control mb-2 me-0 text-light" style="height:100px;" name="text" id="text" placeholder="Write body of banner..." required ></textarea>
                    </div>

                    <div class="text-start">
                      <x-label for="href" value="Page where button takes user to:" />
                      <select class="form-control mb-2 me-0 text-light" style="height:40px;" name="href" id="href" required>
                        @foreach ($user_pages as $key => $value)
                          <option class="text-light" value="{{ $value }}">{{ Str::upper($key) }}</option>
                        @endforeach
                      </select>                      
                    </div>

                    <div class="text-start">
                      <x-label for="link_text" value="Button's text:" />
                      <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="link_text" id="link_text" placeholder="Write text to show on button..." required />
                    </div>

                    {{-- @if (count($positions) > 1) 
                      <div class="text-start mb-3">
                        <x-label for="position" value="Position:" />
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
                    @endif            --}}
                    
                    <button type="submit" class="form-control mb-2 bg-danger btn btn-danger ms-0" style="height:40px;">
                      Add advert
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