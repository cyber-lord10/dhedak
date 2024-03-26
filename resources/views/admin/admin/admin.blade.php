    
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

                @if (session()->has('notification'))
                  <x-notification :bgcolor="session('color')" :object="session('object')" >
                    {!! session('notification') !!}
                  </x-notification>
                @endif

                @if (App\Http\Controllers\AdminController::isHighAdmin())

                  <h2 class="h2font">Add Sub Admin</h2>
                  <form action="{{url('/admin/admin/add')}}" class="my-border-radius mx-auto w-100" style=" " method="POST">
                  
                    @if (session()->has('message') && session()->has('used_admin'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <b style="color: inherit;">"{!!session('used_admin')!!}"</b> 
                          {!!session('message')!!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @if (session()->has('err_msg') && session()->has('used_admin'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <b style="color: inherit;">"{!!session('used_admin')!!}"</b> 
                          {!!session('err_msg')!!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @if (session()->has('warn_msg') && session()->has('used_admin'))
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <b style="color: inherit;">"{!!session('used_admin')!!}"</b> 
                          {!!session('warn_msg')!!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @csrf

                    <div class="text-center">
                      Choose name to make admin
                      <select name="id" id="id" class="me-0 text-dark" style="width:calc(100% - 60px); height:40px;" >
                        @foreach ($clients as $client)
                          <option class="text-dark" value="{{$client->id}}">{{$client->name}}</option>
                        @endforeach
                      </select>
                      <button type="submit" class="btn btn-danger ms-0" style="height:40px;">Add</button>
                    </div>
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                  </form>

                @endif


                <h3 class="mt-4">Existing admins</h3>

                <div class="" style="overflow-x: auto;">
                  <table class="table table-dark table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $counter = 0; @endphp
                      @foreach ($admins as $admin)
                        @php $counter++ @endphp
                        <tr title="{{Illuminate\Support\Str::title($admin->name) . ' (' . $admin->email . ')'}}">
                          <td scope="row">{{$counter}}</td>
                          <td>
                            {{Illuminate\Support\Str::title($admin->name)}} 
                            @if ($admin->usertype > 2)
                              <div class="badge text-white" style="background-color: #009900; font-size: 10px; padding: 3.5px;" title="Owner administrator account (has control over all the admins e.i both masters and sub admin accounts)">owner</div>
                            @elseif ($admin->usertype > 1)
                              <div class="badge text-dark" style="background-color: rgb(245, 177, 30); font-size: 10px; padding: 3.5px;" title="Master administrator account (has control over all sub admin and only the master admin accounts created by it)">master</div>
                            @endif                  
                          </td>

                          @if (Auth::user()->usertype > 1)

                            @if ($admin->usertype < 3)
                              @if ($admin->id == Auth::user()->id)
                                <td>
                                  <a onclick="return confirm('Are you sure you want remove yourself from being an admin?')" href="{{url('/admin/admin/drop_self')}}" class="btn btn-danger" title="Remove yourself from being an admin to a regular user">Remove self</a>
                                  @if ($admin->usertype > 1)
                                    <a onclick="return confirm('Are you sure you want to drop MASTER ADMIN to SUB ADMIN?')" href="{{url('/admin/admin/drop_self_master')}}" class="btn btn-warning" title="Drop yourself from being a master admin account to sub-admin account">Drop self</a>
                                  @endif
                                </td>
                              @else
                                <td>
                                  @if ($admin->usertype <= 2)
                                    <a onclick="return confirm('Are you sure you want remove Sub-Admin?')" href="{{url('/admin/admin/remove', $admin->id)}}" class="btn btn-danger" title="Remove user from being an admin to a regular user">Remove</a>
                                    @if ($admin->usertype > 1)
                                      <a onclick="return confirm('Are you sure you want to drop MASTER ADMIN to SUB ADMIN?')" href="{{url('/admin/admin/remove_master', $admin->id)}}" class="btn btn-warning" title="Drop user from master admin account to sub-admin account">Drop master</a>
                                    @else
                                      <a onclick="return confirm('Are you sure you want make SUB ADMIN a MASTER ADMIN?')" href="{{url('/admin/admin/make_master', $admin->id)}}" class="btn btn-success" title="Make user a master-admin">Make master</a>
                                    @endif
                                  @endif
                                </td>
                              @endif
                            @else 
                              <td></td>
                            @endif

                          @else
                            
                            @if ($admin->email == Auth::user()->email)
                              <td>
                                <a onclick="return confirm('Are you sure you want remove yourself from being an admin?')" href="{{url('/admin/admin/drop_self')}}" class="btn btn-danger" title="Remove yourself from being an admin to a regular user">Remove self</a>
                              </td>
                            @else 
                              <td></td>
                            @endif
                            
                          @endif

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