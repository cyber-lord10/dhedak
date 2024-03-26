    
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


                <h3 class="">Add Contact Info</h3>

                <form action="{{url('/admin/contact/add')}}" class="my-border-radius mx-auto" style="max-width:400px;" method="POST">

                  @if (session()->has('message') && session()->has('used_contact_info'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b style="color: inherit;">"{{session('used_contact_info')}}"</b> {{session('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @csrf

                  <div class="text-center">
                    <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="contact_info" id="contact_info" placeholder="Write contact info..."/>
                    <input type="text" class="form-control mb-2 me-0 text-light" style="height:40px;" name="contact_value" id="contact_value" placeholder="Write contact value..."/>
                    <input type="number" class="form-control mb-2 me-0 text-light" style="height:40px;" name="position" id="position" placeholder="Website appearance position..."/>
                    <button type="submit" class="form-control mb-2 bg-danger btn btn-danger ms-0" style="height:40px;">Add contact info</button>
                  </div>

                </form>

                <hr>

                <h3 class="mt-4">Your Contact Infos</h3>
                <table class="table table-dark table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Contact info</th>
                      <th scope="col">Value</th>
                      <th scope="col">Position</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $counter = 0; @endphp
                    @foreach ($contacts as $contact)
                      @php $counter++ @endphp
                      <tr title="{{$contact->info}}">
                        <td scope="row">{{$counter}}</td>
                        <td>{{$contact->info}}</td>
                        <td>{{$contact->value}}</td>
                        <td>{{$contact->position}}</td>
                        <td>
                          <a onclick="return confirm('Are you sure you want to delete category?')" href="{{url('/delete_contact_info', $contact->id)}}" class="btn btn-danger">Delete</a>
                          <a href="{{ url('/admin/contact/update', $contact->id) }}" class="btn btn-success ms-2">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                

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