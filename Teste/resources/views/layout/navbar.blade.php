


<div class="p-5">

    <img  class="absolute -top-25 hidden left-0 md:flex " src="{{asset('image/Group 62 (1).png')}}" alt="">

    
    <header class=" hidden   md:flex relative items-center rounded-2xl  bg-white justify-between  w-full">
        <img class="h-25"  src="{{asset('image/Logo - Isotipo Cor.png')}}" alt="">
        <span class="flex font-medium text-gray-600 text-2xl ">SenacShow</span>
        <ul class="flex w-full gap-10 justify-center items-center">

            
            @if(Auth::user()->profile == 'Adm')
                <li>
                    <a href="{{route('events')}}" class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-calendar"></i>Eventos</a>
                </li>
            @endif

            @if(Auth::user()->profile == 'Adm' or Auth::user()->profile == 'Saller')
                <li>
                    <a href="{{route('tickets')}}"  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-ticket"></i>Ingressos</a>
                </li>

            @endif

            @if(Auth::user()->profile == 'Adm')
                <li>
                    <a href="{{route('users')}}"  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-users"></i>Usuários</a>
                </li>

            @endif

             @if(Auth::user()->profile == 'Adm' or Auth::user()->profile == 'Check')
            <li>
                <a href="{{route('check')}}"  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-qrcode"></i>Validador</a>
            </li>

            @endif

            
            @if(Auth::user()->profile == 'Adm' or Auth::user()->profile == 'Saller')
            <li>
                <a href="{{route('saller')}}"  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-receipt"></i>Venda</a>
            </li>

            @endif

            @if(Auth::user()->profile == 'Adm')
            <li>
                <a href="{{route('dashboard')}}"  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-grip"></i>Dashboard</a>
            </li>
            @endif
            
        </ul>
        @livewire('logunt')
    </header>

</div>




<div class="fixed z-[130] overflow-auto md:hidden bottom-0 left-0  w-full h-16 bg-[#f31366] border-t text-white border-gray-200 dark:bg-gray-700 dark:border-gray-600">

    <ul class="flex w-full p-3 gap-8 items-center">
        @if(Auth::user()->profile == 'Adm')
        <li class="">
            <a href="{{route('events')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-calendar"></i>Eventos</a>
        </li>
        @endif
          @if(Auth::user()->profile == 'Adm' or Auth::user()->profile == 'Saller')
        <li class="">
            <a href="{{route('tickets')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-ticket"></i>Ingressos</a>
        </li>
        @endif
        @if(Auth::user()->profile == 'Adm')
        <li class="">
            <a href="{{route('users')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-users"></i>Usuários</a>
        </li>
        @endif
        @if(Auth::user()->profile == 'Adm' or Auth::user()->profile == 'Check')
        <li class="">
            <a href="{{route('check')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-qrcode"></i>Validador</a>
        </li>
        @endif
        @if(Auth::user()->profile == 'Adm' or Auth::user()->profile == 'Saller')
        <li class="">
            <a href="{{route('saller')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-receipt"></i>Venda</a>
        </li>
        @endif
        @if(Auth::user()->profile == 'Adm')
        <li class="">
            <a href="{{route('dashboard')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-grip"></i>Dashboard</a>
        </li>
        @endif
        @livewire('logunt')
    </ul>
   
</div>

