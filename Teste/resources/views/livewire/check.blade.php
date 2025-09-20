<div>
   
    <div class="flexx fixed top-1 left-1">
        @livewire('logunt')
    </div>


    <div class="flex w-full justify-center items-center flex-col">

        <div class="flex mt-30 md:mt-0 md:w-1/2 justify-center gap-10 flex-col  items-center">

            <div class="flex flex-col gap-2 ">

                @if(Auth::user()->profile == 'Adm')
                    <a href="{{route('events')}}" class="text-gray-500"><i class="fa-solid fa-chevron-left"></i>voltar</a>
                @endif

                <span class="flex  gap-2 font-medium text-gray-600 text-3xl">Sistema de <span class="text-[#f31366]">Validação</span></span>
            </div>
            <div class="flex p-1 w-70 justify-center items-center border-[#f31366] border-1 border-dashed rounded-2xl">
                    <i class="fa-solid text-[#f31366] text-[200px] fa-qrcode"></i>
            </div>
            <div class="flex p-3 text-xl rounded-2xl bg-gray-100 text-gray-600">
                Digite o código para validar
            </div>
            

            <form wire:submit="check" class="flex flex-col gap-5 w-full md:w-1/2 ">
                <div class="flex w-full flex-col gap-2">
                    <label for="" class="flex text-lg text-gray-600 ">Código do Ingresso</label>
                    <input wire:model.live="code" placeholder="JL453K3H45K3" type="text" class="flex w-full border-1 border-gray-300 rounded-2xl p-3 ">
                    
                    @if(session('ErroLogin'))
                    <div wire:poll.3s class="flex text-red-700 text-lg">
                        {{session('ErroLogin')}}
                    </div>
                    @endif
                </div>

                @if ($code)
                   <div class="flex  w-full justify-center items-center">
                    <button type='submit' class="flex BtnHover text-xl text-white w-1/2 bg-[#f31366] p-2 rounded-2xl justify-center items-center ">Validar</button>
                </div>
                    
                @endif
            </form>

        </div>

    </div>

    <img class="fixed hidden md:flex rotate-45" src="{{asset('image/Group 107.png')}}" alt="">
    <img class="fixed hidden md:flex right-20 -bottom-10" src="{{asset('image/Group 108.png')}}" alt="">

    <img class="fixed hidden md:flex right-20  -top-10" src="{{asset('image/Group 109.png')}}" alt="">

    <img class="fixed hidden md:flex left-20 -top-10" src="{{asset('image/Group 106.png')}}" alt="">


    <x-alert/>
</div>
