<div>
    
    <div class="flex w-full z-[50] justify-between">

        <div class=" flex  gap-2 flex-1  items-center ">

            <div class="flex w-10 h-10 rounded-2xl shadow-xl bg-white Textazul text-lg justify-center items-center">
                    <i class="fa-solid fa-users"></i>
            </div>
            <span class="text-xl text-gray-600 font-medium">Ingressos {{$eventItem ? '-' . $eventItem->name : ''}} </span> 
        </div>
        <div class="flex w-1/2 items-end flex-col gap-2">
                <label for="" class="flex w-1/4  text-lg text-gray-600 ">Filtrar por evento</label>
                <select wire:change="selectEvent" wire:model='idEvent' name="" id="" class="flex w-1/4 border-1 border-gray-300 rounded-2xl p-3 ">
                    <option >Selecione uma opção</option>
                    @foreach ($events as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
        </div>
    </div>

    

    <div class="flex w-full  z-[50] gap-10 mt-15 justify-center items-center flex-wrap">
        <x-card
            NameCard='Capacidade do Evento'
            :ValudCard=$totalEvent
        
        />
        <x-card
            NameCard='Total de Ingressos Validados'
            :ValudCard=$totalValidado
        
        />
        <x-card
            NameCard='Total de Ingressos Emitidos'
            :ValudCard=$totalNãoValidado
        
        />
    </div>



    <div class="flex w-full bg-white z-[50] mt-15 gap-5 flex-col rounded-2xl shadow-xl p-5">

    <div class="flex w-full justify-between items-center">
        <div class="flex w-1/2 gap-2 bg-white z-[50] ">

                <div class="flex w-10 h-10 bg-blue-100 text-blue-800 rounded-full justify-center items-center ">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <input wire:model.live="search" placeholder="Pesquisar Cliente"  type="text" class="flex w-full md:w-1/2 border-1 border-gray-300 rounded-2xl p-2 ">

        </div>
        <div class="flex w-full items-end flex-col gap-2">
                <label for="" class="flex w-1/4  text-lg text-gray-600 ">Filtrar por status de ingresso</label>
                <select wire:model.change="typeSelectTicket" name="" id="" class="flex w-1/4 border-1 border-gray-300 rounded-2xl p-3 ">
                    <option value="todos">Todos</option>
                    <option value="Emitido">Emitido</option>
                    <option value="Validado">Validado</option>
                </select>
        </div>

    </div>
   

    


    
    <div class="relative z-[50] overflow-x-auto h-60">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome Cliente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipo de Ingresso
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status de Ingresso
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data / Hora Validação
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $item)
                <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->client->name}}     {{$item->client->lastname}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->sector->type_sector}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->status_ticket}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->time_validation}}
                    </td>
                    <td class="px-6 py-4">
                       <div class="flex justify-center items-center gap-3">
                        <button wire:click='verTiciket({{$item->id}})' class="flex w-8 h-8 justify-center BtnHover items-center rounded-full bg-amber-100 text-amber-600 " wire:click="view({{$item->id}})"><i class="fa-solid fa-eye"></i></button>


                        <a href="{{route('donwload', $item->id)}}" class="flex w-8 h-8 justify-center BtnHover items-center rounded-full  bg-[#1331a1]/20 text-[#1331a1] "><i class="fa-solid fa-download"></i></a>


                        <button class="flex w-8 h-8 justify-center BtnHover items-center rounded-full bg-rose-100 text-rose-600 " wire:click="delete({{$item->id}})"><i class="fa-solid fa-trash"></i></button>

                       </div>
                    </td>
                </tr>
                    
                @endforeach
            
            
            </tbody>
        </table>
    </div>

    </div>





    <x-alert/>


    

@if($openVisuModal)
<div class=" flex inset-0 z-[999] fixed bg-black/20 justify-center items-center">
    <div class="flex p-2 rounded-2xl bg-white flex-col gap-2">
        <div class="flex w-full items-end justify-end ">
               <button wire:click="closeVisuModal" class="flex rounded-full p-2 BtnHover w-10 h-10 justify-center items-center  bg-gray-100 text-gray-600"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <img src="{{$visuTicket}}" alt="">
    </div>

 

</div>

@endif

    

</div>
