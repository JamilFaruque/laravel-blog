@props(['type'=>'submit'])

<button type="{{$type}}"
{{ $attributes->merge(['class' => 'bg-blue-500 px-5 uppercase py-1 font-bold text-white rounded-lg']) }}>
  {{ $slot }}
</button>