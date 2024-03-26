@props(['text_class', 'form_class', 'width'])

<form class="{{$form_class ?? false}}" method="POST" action="{{ route('logout') }}" {{$attributes->merge(['class'=>'', 'style'=>''])}} @style(['width'=>$width ?? false])>
  @csrf
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="{{$text_class ?? false}}" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" id="logout" @style(['width'=>$width ?? false])>
    {{$slot}}
  </div>
</form>
