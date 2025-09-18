@if(session('Sucess'))



<div class=" flex inset-0 fixed z-[999] bg-black/20 justify-center items-center">

    <div class="flex justify-center p-5 rounded-2xl bg-white gap-10  items-center w-100 md:w-120 flex-col">

        <div class="flex w-30 justify-center items-center h-30 rounded-full bg-green-100 text-green-600 text-6xl">
            <i class="fa-solid fa-check"></i>
        </div>

         <span class="text-gray-600 font-medium text-center text-xl">{{session('Sucess')}}</span>

        <div class="flex w-full justify-center items-center">
                 <button wire:click="$refresh" class="flex rounded-full p-2 BtnHover rod bg-gray-100 text-gray-600"><i class="fa-solid fa-xmark"></i></button>
        </div>

    </div>

</div>

@endif
@if(session('Error'))



<div class=" flex inset-0 z-[999] fixed bg-black/20 justify-center items-center">

    <div class="flex  gap-10  justify-center  p-5 rounded-2xl  bg-white md:w-120  items-center w-100 flex-col">

        <div class="flex w-30 h-30 justify-center items-center rounded-full bg-rose-100 text-rose-600 text-6xl">
          <i class="fa-solid fa-xmark"></i>
        </div>
        <span class="text-gray-600 text-center font-medium text-xl">{{session('Error')}}</span>

        <div class="flex w-full justify-center items-center">
                 <button wire:click="$refresh" class="flex rounded-full p-2 BtnHover rod bg-gray-100 text-gray-600"><i class="fa-solid fa-xmark"></i></button>
        </div>

    </div>

</div>

@endif