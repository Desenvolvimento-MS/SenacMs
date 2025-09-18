@props(['label','model','type','xmask' =>null,
'placeholder' => null])




<div class="flex w-full flex-col gap-2">
    <label for="" class="flex text-lg text-gray-600 ">{{$label}}</label>
    <input wire:model="{{$model}}" placeholder="{{$placeholder}}" x-mask='{{$xmask}}' type="{{$type}}" class="flex w-full border-1 border-gray-300 rounded-2xl p-3 ">

    @if(session('ErrorForm'))


     <div class="flex text-red-700 text-lg">
        {{session('ErrorForm')}}
    </div>
    @endif

    @error($model)
    <div class="flex text-red-700 text-lg">
        {{$message}}
    </div>
        
    @enderror

</div>