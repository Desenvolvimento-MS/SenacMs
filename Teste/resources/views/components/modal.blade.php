@props(['NameModal', 'StatusMOdal'])


@if($StatusMOdal)
<div class=" flex inset-0 z-[99] fixed bg-black/20 justify-center items-center">

    <div class="flex w-100  bg-white md:w-200 p-5 rounded-2xl flex-col gap-5">

        <div class="flex w-full justify-between">
            <span class="flex text-2xl text-gray-600">{{$NameModal}}</span>
            

            <button wire:click="closeModal" class="flex rounded-full p-2 BtnHover rod bg-gray-100 text-gray-600"><i class="fa-solid fa-xmark"></i></button>

        </div>


        <div class="flex w-full flex-col justify-center items-center gap-3">
            {{$slot}}
        </div>

    </div>

</div>

@endif