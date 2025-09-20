@props(['NameModal', 'StatusMOdal', 'RegisterCliente' => null])


@if($StatusMOdal)
<div class=" flex inset-0 z-[99] fixed bg-black/20 justify-center items-center">

    <div class="flex w-100  bg-white md:w-200 p-5 rounded-2xl flex-col gap-5">

        <div class="flex w-full justify-between">
            <span class="flex  text-lg md:text-2xl text-gray-600">{{$NameModal}}</span>
            
            @if ($RegisterCliente)
              <button wire:click="FuncshowModalCLient" class="flex p-2 rounded-2xl justify-center items-center text-lg font-medium BtnHover bg-[#1331a1]/20  text-[#1331a1]">Cadastrar Cliente</button>

    

            @endif


        
            <button wire:click="closeModal" class="flex rounded-full p-2 BtnHover w-10 h-10 justify-center items-center  bg-gray-100 text-gray-600"><i class="fa-solid fa-xmark"></i></button>


          

        

        </div>


        <div class="flex w-full flex-col justify-center items-center gap-3">
            {{$slot}}
        </div>

    </div>

</div>

@endif