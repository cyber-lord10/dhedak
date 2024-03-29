
@props(['markers'])

{{-- <div style="color: rgb(82, 150, 82);"></div> --}}
<script>

$(document).ready(function () {
  
  let uri = window.location.href;

  if (uri.endsWith('/markers')) {
    @foreach ($markers as $marker)
      $('#deleteForm{{$marker->id}}').on('submit', function(event) {
        event.preventDefault(); 
        var confirmation = confirm('Are you sure you want to remove marker?');
        if (confirmation) {
            $(this).unbind('submit').submit(); 
        }
      });
    @endforeach
  } 

});

</script>