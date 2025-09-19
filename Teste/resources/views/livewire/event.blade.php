<div>
   


    <div class="flex w-full z-[50] justify-between">

        <div class=" flex  gap-2 justify-between items-center ">

            <div class="flex w-10 h-10 rounded-2xl shadow-xl bg-white Textazul text-lg justify-center items-center">
                    <i class="fa-solid fa-users"></i>
            </div>
            <span class="text-xl text-gray-600 font-medium">Eventos</span>

        </div>

        <button wire:click='typeForm' class="flex p-2 rounded-2xl justify-center items-center text-white BtnHover azul gap-2 w-1/2 md:w-1/6 font-medium  ">
            <i class="fa-solid fa-plus"></i>
            Cadastrar Eventos
        </button>

    </div>


    <div class="flex w-full  z-[50] gap-10 mt-15 justify-center items-center flex-wrap">
        <x-card
            NameCard='Total de Eventos'
            :ValudCard=$TotalEvent
        
        />
    </div>





    <div class="flex w-full bg-white z-[50] mt-15 gap-5 flex-col rounded-2xl shadow-xl p-5">

        
    <div class="flex w-full gap-2 bg-white z-[50] ">

        <div class="flex w-10 h-10 bg-blue-100 text-blue-800 rounded-full justify-center items-center ">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <input wire:model.live="search" placeholder="Pesquisar Evento"  type="text" class="flex w-full md:w-1/4 border-1 border-gray-300 rounded-2xl p-2 ">

    </div>

    <div class="relative z-[50] overflow-x-auto h-60">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome do Evento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Capacidade do Evento
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Data do Evento
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Horário do Evento
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Ver Setores
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $item)
                <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->name}}  
                    </td>
                    <td class="px-6 py-4">
                        {{$item->capacity_ticket}}
                    </td>
                    <td class="px-6 py-4">
                        {{\Carbon\Carbon::parse($item->date_event)->format('d/m/Y')  }}
                    </td>
                    <td class="px-6 py-4">
                         {{\Carbon\Carbon::parse($item->time_event)->format('H:i')  }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center items-center">
                            <a class="BtnHover p-1 rounded-2xl " href="{{route('event.saller', $item->id)}}">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                        </div>
                    </td>
                    <td class="px-6 py-4">
                       <div class="flex justify-center items-center gap-3">
                        <button class="flex w-8 h-8 justify-center BtnHover items-center rounded-full bg-green-100 text-green-600 " wire:click="typeForm({{$item->id}}, 'update')"><i class="fa-solid fa-pencil"></i></button>
                        <button class="flex w-8 h-8 justify-center BtnHover items-center rounded-full bg-rose-100 text-rose-600 " wire:click="delete({{$item->id}})"><i class="fa-solid fa-trash"></i></button>

                       </div>
                    </td>
                </tr>
                    
                @endforeach
            
            
            </tbody>
        </table>
    </div>


    </div>


    <x-modal
    NameModal="{{$updateFom ? 'Editar' : 'Cadastrar'}} Evento"
    :StatusMOdal=$showModal
    
    >

    <div class="flex w-full gap-5 md:flex-row flex-col justify-between">
        <x-input
        label='Nome'
        model="form.name"
        type='text'
        placeholder='Senac Grande Show'
        
        />
        <x-input
        label='Capacidade do evento'
        model="form.capacity_ticket"
        type='number'
        placeholder='5000'
        
        />

    </div>
    <div class="flex w-full gap-5 md:flex-row flex-col  justify-between">
        <x-input
        label='Data do Evento'
        model="form.date_event"
        type='date'
        placeholder='10/10/2025'
        
        />
        <x-input
        label='Horário do Evento'
        model="form.time_event"
        type='time'
        placeholder='08:30'
        
        />

    </div>
    
    <div class="flex w-full gap-5 md:flex-row flex-col  justify-between">
       
        <x-input
        label='Endereço do evento'
        model="form.endereco_event"
        type='text'
        placeholder='Rua Lima,45, Centro, MS'
        
        />

          <x-input
        label='Limite de ingressos por pessoa'
        model="form.limit_ticket"
        type='number'
        placeholder='5'
        
        />
       

    </div>
    <div class="flex w-full  gap-5 md:flex-row flex-col  justify-center ">
       
        <div class="flex w-1/2">
             <x-input
            label='Imagem do evento'
            model="form.img_event"
            type='file'
            placeholder='Adicione uma imagem'
            
            />
        </div>
       

    </div>

    <div class="flex w-full mt-10 justify-center items-center gap-5">

        <button wire:click='closeModal' class="flex p-2 rounded-2xl w-1/2 BtnHover bg-red-100 text-rose-600 justify-center items-center">Cancelar</button>
        <button  wire:click='{{$updateFom ? 'update' : 'register'}}'  class="flex p-2 rounded-2xl w-1/2 BtnHover bg-green-100 text-green-600 justify-center items-center">{{$updateFom ? 'Editar' : 'Cadastrar'}}</button>
    </div>
    




    </x-modal>

    <x-alert/>


    <img class="fixed bottom-0 right-20 z-[10]" src="{{asset('image/Group 104.png')}}" alt="">


</div>
