
<!-- START of #TOP# -->
<x-top />
<!-- END OF #BOTTOM# -->

    <!-- START of header -->
    @include('home.inc.header')
    <!--/ END of header section -->

    
    <!-- START of flash notification --> 
    @if (session()->has('notification'))   
      <x-notification :bgcolor="session('color')" :object="session('object')">
        {!! session('notification') !!}
      </x-notification>
    @endif
    <!--/ END of flash notification -->

  
  <!-- PAGE SECTIONS -->

    <!-- SUBTITLE-SECTION -->
    <x-sections.subtitle subtitle="<span>Contact</span> Us" />
      
     <!-- CONTACT-SECTION -->
    <section class="why_section layout_padding">
      <div class="container">
      
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <div class="full">

                  @if (session()->has('email_sent') && session('email_sent')==true) 
                              
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Email <b style="color: inherit;">successfully</b> !
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                  @elseif (session()->has('email_sent') && session('email_sent')==false)

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Email <b style="color: inherit;">failed</b> to send!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                  @endif

                  @if ($errors->any()) 
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">Invalid</b> inputs!
                      <button type="button" c|lass="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  

                  <form action="{{route('sendmail')}}" method="POST">
                    <fieldset> 

                      @csrf
                      
                      <input type="text" class="@error('name'){{'border border-danger border-3'}}@enderror" placeholder="Enter your full name" name="name" value="{{old('name')}}" required />
                      @error('name')
                          <p class="text-danger mt-0 p-0 mb-4">{{$message}}</p>
                      @enderror

                      <input type="email" class="@error('email'){{'border border-danger border-3'}}@enderror" placeholder="Enter your email address" name="email" value="{{old('email')}}" required />
                      @error('email')
                          <p class="text-danger mt-0 p-0 mb-4">{{$message}}</p>
                      @enderror

                      <input type="text" class="@error('subject'){{'border border-danger border-3'}}@enderror" placeholder="Enter subject" name="subject" value="{{old('subject')}}" required />
                      @error('subject')
                          <p class="text-danger mt-0 p-0 mb-4">{{$message}}</p>
                      @enderror

                      <textarea class="@error('message'){{'border border-danger border-3'}}@enderror" placeholder="Enter your message" name="body" required>{{old('body')}}</textarea>
                      @error('body')
                          <p class="text-danger mt-0 p-0 mb-4">{{$message}}</p>
                      @enderror

                      <input type="submit" value="Contact Us" />
                    </fieldset>
                  </form>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!-- end CONTACT-SECTION -->
    
    <!-- START of ARRIVAL-SECTION -->
    <x-sections.arrival-section />
    <!--/ END of  ARRIVAL-SECTION -->
  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->





