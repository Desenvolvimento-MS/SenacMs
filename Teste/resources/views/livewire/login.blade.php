<div>
    

    <div class="flex w-full flex-col md:flex-row">

        <div class="relative  hidden md:flex w-1/2">

            <div class=" hidden md:flex  fixed w-[600px] top-30 rotate-45 h-[600px] rounded-2xl bg-[#1331a1]"></div>
            <div class=" hidden md:flex fixed w-[600px] top-40 opacity-20 rotate-45 h-[600px] rounded-2xl bg-[#1331a1]"></div>

              <div class=" hidden md:flex fixed left-100 w-[300px] top-30 rotate-45 h-[300px] rounded-2xl bg-[#f31366]"></div>
              <div class=" hidden md:flex fixed left-100 w-[300px] top-40 rotate-45 h-[300px] opacity-20 rounded-2xl bg-[#f31366]"></div>

              
            <div class=" hidden md:flex fixed w-[600px] rotate-45 h-[600px] -bottom-100 left-100  rounded-2xl bg-[#f8b62f]"></div>
            <div class=" hidden md:flex fixed w-[600px] rotate-45 h-[600px] -bottom-90 left-100 opacity-20  rounded-2xl bg-[#f8b62f]"></div>

        </div>

        <div class="flex mt-30 md:mt-0 gap-4 flex-col justify-center items-center w-full md:w-1/2">

            <img class=" h-60 md:h-50" src="{{asset('image/Logo - Isotipo Cor.png')}}" alt="">
            <span class="flex text-4xl text-gray-600 font-medium">Login</span>

            <form class="flex flex-col gap-5 w-full md:w-1/2" wire:submit='login' action="">

                <x-input
                label='E-mail / CPF'
                model="inputLogin"
                type="text"
                placeholder='rafa@gmail.com / 23435675432'

                />

                <x-input
                label='Senha'
                model="password"
                type="password"
                placeholder='*******'>

                 @if(session('ErroLogin'))
                    <div wire:poll.3s class="flex text-red-700 text-lg">
                        {{session('ErroLogin')}}
                    </div>
                @endif
                
                </x-input>

                <div class="flex  w-full justify-center items-center">
                    <button type='submit' class="flex BtnHover text-xl text-white w-1/2 bg-[#f31366] p-2 rounded-2xl justify-center items-center ">Login</button>
                </div>
            
            </form>
            

        </div>






    </div>
</div>
