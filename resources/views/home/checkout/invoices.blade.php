
<!-- START of #TOP# -->
<x-top />
<!-- END OF #BOTTOM# -->

    <!-- START of header -->
    @include('home.inc.header')
    <!--/ END of header section -->


  
  <!-- PAGE SECTIONS -->
  <div class="mb-2">
    <div class="heading_container heading_center">
      <h2>
        Your <span>Invoices</span>
      </h2>
    </div>    
  </div>


      <!-- START of flash notification --> 
      @if (session()->has('notification'))   
        <x-notification :bgcolor="session('color')" :object="session('object')">
          {!! session('notification') !!}
        </x-notification>
      @endif
      <!--/ END of flash notification -->


  <div class="container">
    
    <div class="row gap-3">
      
      @foreach ($invoices as $invoice)
        
        @php
          $items = explode(',, ', $invoice->items);         
          
          $date = new DateTime($invoice->created_at);
          $readable_date = $date->format('h:sA | F d, Y');          
        @endphp
        
        <div class="col-sm-12 col-md-6 mb-4 mx-auto border p-2 rounded-12px invoice-container h-fit" style="background-color: rgb(250, 246, 246);"> 
          <div class="mb-3">
            <span class="text-muted px-2 pt-2 pb-1 d-inline-block">{{$readable_date}}</span> <span class="badge badge-danger p-1">paid</span>
          </div>
          @foreach ($items as $item)
            @php
              $item = Str::replaceFirst('$', '<span class="text-danger">$', $item);
              $item = $item . '</span>';
            @endphp   
            <p class="m-1 px-2">{!! $item !!}</p>
          @endforeach
          {{-- <div class="invoice-footer"> --}}
            <div class="text-end fs-4 my-2 me-4" style="font-size: 22px;">Total: <span class="text-danger"><b>${{number_format($invoice->total, 0 , '', ',')}}</b></span></div>
            <a href="{{url('/invoice/request_mail', $invoice->id)}}" class="btn btn-danger w-100 my-3">Request mail</a>
          {{-- </div> --}}
          
        </div> 
               
        
      @endforeach 


    </div> 


    
    <div class="mt-3">
      {!! $invoices->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>


  </div>

  
  <!-- START of FOOTER -->
  @include('home.inc.footer')
  <!--/ END of CLIENT-SECTION -->
  
<!-- START OF #BOTTOM# -->
<x-bottom />
<!--/ END of #BOTTOM# -->

