@props(['active'])
<a class="{{ $active?'bg-[#BAB49B] text-white':'text-white hover:bg-[#BAB49B] hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium"
   aria-current="{{$active?'page':'false'}}'" {{$attributes}}>{{$slot}}</a>
