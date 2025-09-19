<div>
    
    <div class="flex w-full z-[50] justify-between">

        <div class=" flex  gap-2 flex-wrap justify-center md:justify-between items-center ">

            <div class="flex w-10 h-10 rounded-2xl shadow-xl bg-white Textazul text-lg justify-center items-center">
                    <i class="fa-solid fa-users"></i>
            </div>
            <span class="text-xl text-gray-600 font-medium">Eventos</span>

        </div>

        <div class="flex items-center gap-2 w-1/5">
            <div class="flex w-10 h-10 bg-blue-100 text-blue-800 rounded-full justify-center items-center ">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input wire:model.live="search" placeholder="Pesquisar Evento"  type="text" class="flex w-full  border-1 border-gray-300 rounded-2xl p-2 ">
        </div>
    </div>



    <div class="flex w-full justify-center gap-10">

        @foreach ($events as $item)
            <div class="flex w-100 flex-col z-[99] rounded-2xl p-5 bg-white shadow-xl gap-5">

                <img class="flex w-full rounded-2xl h-30" src="{{Storage::url($item->img_event)}}" alt="">

                <div class="flex gap-2 flex-col ">
                    <span class="flex text-2xl text-gray-600 font-medium">{{$item->name}}</span>
                    <span class="flex text-xl text-gray-600 ">Capacidade do evento: {{$item->capacity_ticket}}</span>
                    <span class="flex mt-5 text-lg text-gray-600 ">{{$item->endereco_event}}</span>
                    <div class="flex mt-2 justify-center items-center p-2 gap-2  text-gray-400 w-full rounded-2xl font-medium bg-gray-100">
                        <span class="flex text-lg text-gray-600 "> Data:   {{\Carbon\Carbon::parse($item->date_event)->format('d/m/Y')  }} - Horário:    {{\Carbon\Carbon::parse($item->time_event)->format('H:i')  }}</span>
                    </div>
                    

                    <a href="{{route('saller.sector',  $item->id)}}" class="flex mt-5 BtnHover p-2 rounded-2xl bg-[#1331a1]/20 items-center gap-2 text-[#1331a1] justify-center  text-xl font-medium"><i class="fa-solid fa-calendar"></i>Ver evento</a >
                  

                </div>
            </div>            
        @endforeach

    </div>

    
    <img class="fixed bottom-0 right-20 z-[10]" src="{{asset('image/Group 104.png')}}" alt="">



    
</div>
