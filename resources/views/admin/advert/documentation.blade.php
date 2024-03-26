
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
              
              <div class="" >


                <h3 class="text-info text-center">Advert Documentation</h3>

                <div class="">
                  <p class="">Here we will guide on how to go about the advert section, and how to utilize it's functionalities as well</p>
                  <p class="">Below are the semantics/expressions with an example of their result which is going to be displayed on the user screen, feel free to use the in the advert creation</p>
                </div>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <b style="color:inherit;">NOTE:</b> These semantics <b style="color:inherit;">can only</b> used in the advert creation form and no where else!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
                <hr>
                
                <table style="width:100%;" class="mb-4">
                  <tr class="capitalize fw-bolder">
                    <th class="p-2 border border-info">semantic</th>
                    <th class="p-2 border border-info">translation</th>
                  </tr>
                  @foreach ($advert_documentations as $key => $adDoc)
                    <tr class="">
                      <td class="p-2 border border-info">{{ $adDoc->semantic }}</td>
                      <td class="p-2 border border-info text-center">{!!$adDoc->translation !!}</td>
                    </tr>
                  @endforeach 
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