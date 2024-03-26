
@props(['action'])

<form class="border border-danger border-2 p-4 mx-auto my-3 rounded-12px"     
      @if ($action != 'null')
        method="POST"
        action="{{$action}}" 
      @endif       
      style="max-width: 450px;">
  {{$slot}}
</form>