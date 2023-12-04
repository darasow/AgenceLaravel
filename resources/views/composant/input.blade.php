@php

$label ??= null;
$name ??= '';
$type ??= 'text';
$class ??= null;
$value ??= '';

@endphp

 <div @class([" py-2 relative", $class])>
            <label for="{{$name}}" class="text-sm md:text-lg @error($name) after:content-['*'] after:text-red-500 after:text-2xl @enderror"> {{$label}} </label>
             @if($type === 'textarea')
               <textarea type="{{$type}}" name="{{$name}}" id="{{$name}}" @class(["text-2xl rounded-lg w-full  py-1 border-black bg-neutral-200 focus:scale-105 focus:delay-200 focus:duration-100 text-black pl-4 pr-10", $class])>{{old($name, $value)}}</textarea>
            @else
              <input @class(["text-2xl rounded-lg w-full  py-1 border-black bg-neutral-200 focus:scale-105 focus:delay-200 focus:duration-100 text-black pl-4 pr-10", $class]) type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{old($name, $value)}}">
            @endif
                
                @error($name)
                <div class="text-red-600 mt-2 text-sm">

                {{$message}}
                
                </div>
                @enderror
  </div>