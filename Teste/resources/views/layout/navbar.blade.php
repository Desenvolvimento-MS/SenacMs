


<div class="p-2">

    <img  class="absolute hidden md:flex  top-5 left-3" src="{{asset('image/Frame 80.png')}}" alt="">

    
    <header class=" hidden md:flex relative items-center rounded-2xl  bg-white justify-between w-full">
        <img class="h-25"  src="{{asset('image/Logo - Isotipo Cor.png')}}" alt="">
        <ul class="flex w-full gap-10 justify-center items-center">

            <li>
                <a href="{{route('events')}}" class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-calendar"></i>Eventos</a>
            </li>
            <li>
                <a href="{{route('ticket')}}"  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-ticket"></i>Ingressos</a>
            </li>
            <li>
                <a href="{{route('users')}}"  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-users"></i>Usuários</a>
            </li>
            <li>
                <a href=""  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-qrcode"></i>Validador</a>
            </li>
            <li>
                <a href="{{route('saller')}}"  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-receipt"></i>Venda</a>
            </li>
            <li>
                <a href=""  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600 items-center"><i class="fa-solid fa-grip"></i>Dashboard</a>
            </li>
        </ul>
        <li class="flex ">
            <a href=""  class="flex gap-2 BtnHover text-lg font-medium p-1 rounded-2xl text-gray-600  items-center"><i class="fa-solid fa-right-from-bracket"></i>Sair</a>
        </li>
    </header>

</div>




<div class="fixed z-[130] overflow-auto md:hidden bottom-0 left-0  w-full h-16 bg-[#f31366] border-t text-white border-gray-200 dark:bg-gray-700 dark:border-gray-600">

    <ul class="flex w-full p-3 gap-8 items-center">
        <li class="">
            <a href="{{route('events')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-calendar"></i>Eventos</a>
        </li>
        <li class="">
            <a href="{{route('ticket')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-ticket"></i>Ingressos</a>
        </li>
        <li class="">
            <a href="{{route('users')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-users"></i>Usuários</a>
        </li>
        <li class="">
            <a href="" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-qrcode"></i>Validador</a>
        </li>
        <li class="">
            <a href="{{route('saller')}}" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-receipt"></i>Venda</a>
        </li>
        <li class="">
            <a href="" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-grip"></i>Dashboard</a>
        </li>
        <li class="">
            <a href="" class="flex flex-col gap-1 justify-center items-center"><i class="fa-solid fa-right-from-bracket"></i>Sair</a>
        </li>
    </ul>
   
</div>

