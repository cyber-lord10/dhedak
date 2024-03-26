    
    {{-- START of #TOP# --}}
    @include('admin.inc.header')
    {{-- END of #TOP# --}}

      <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.partials._sidebar')


        <!-- partial -->
        <div class="container-fluid page-body-wrapper"> 
          
          @include('admin.partials._partial2')

          <!-- partial -->
          @include('admin.partials._partial3')
            <!-- content-wrapper ends -->


            <!-- partial:partials/_footer.html -->
            @include('admin.partials._footer')
            <!-- partial --> 

            
        </div>
          <!-- main-panel ends -->
        <!-- page-body-wrapper ends -->
    
      </div>

    {{-- START of #TOP# --}}
    @include('admin.inc.footer')
    {{-- END of #TOP# --}}