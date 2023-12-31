@props(['name'])

<div>
  <textarea 
    class="w-full pl-3 border-0 rounded" 
    name="{{$name}}"
    placeholder="body goes here.."
    {{ $attributes }}
  >{{old($name) ?? $slot}}</textarea>
</div>