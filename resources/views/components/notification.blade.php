@props(['bgcolor', 'object'])

<div class="alert alert-{{$bgcolor}} alert-dismissible fade show" role="alert">
  <b style="color: inherit;">"{{$object}}"</b> 
    {!!$slot!!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>