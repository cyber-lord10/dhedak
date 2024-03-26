@props(['url'])
<tr>
<td class="header">
<a href="{{url('/')}}" style="display: inline-block;">
  <img src="{{asset('home/images/logo.png')}}" class="logo" alt="{{env('APP_NAME') . 'logo'}}">
  {{ $slot }}
  <div class="" style="text-align: center; text-transform: uppercase;">
    {{env('APP_NAME')}}
  </div>
</a>
</td>
</tr>
