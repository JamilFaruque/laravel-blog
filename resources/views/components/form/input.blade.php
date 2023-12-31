@props(['name', 'type'=> 'text' ,'value' ])

<div>
  <input class="w-full border-0 rounded" 
    type="{{$type}}" 
    placeholder="{{ ucwords($name) }}" 
    name="{{$name}}" 
    value="{{ $value ?? old($name) }}"
    {{ $attributes }}
    >
</div>