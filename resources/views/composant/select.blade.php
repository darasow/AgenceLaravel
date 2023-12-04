@php

$label ??= null;
$name ??= '';
$class ??= null;
$value ??= '';
@endphp

 <div @class([" py-2 relative", $class])>
            <label for="{{$name}}" class="text-sm md:text-lg @error($name) after:content-['*'] after:text-red-500 after:text-2xl @enderror"> {{$label}} </label>
             <select @class(["text-2xl rounded-lg w-full  py-1 border-black bg-neutral-200 focus:scale-105 focus:delay-200 focus:duration-100 text-black pl-4 pr-10", $class]) name="{{$name}}[]" id="{{$name}}" multiple>
               
                @foreach($options as $key => $valeur)
                    <option @selected($value->contains($key)) value="{{$key}}">{{$valeur}}</option>
                @endforeach

             </select>
                
                @error($name)
                <div class="text-red-600 mt-2 text-sm">

                {{$message}}
                
                </div>
                @enderror
  </div>
