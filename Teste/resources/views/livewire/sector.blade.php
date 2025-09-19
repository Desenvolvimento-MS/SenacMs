<div>
   
    <div class="flex w-full z-[50] justify-between">

        <div class=" flex  gap-2 justify-between items-center ">

            <div class="flex w-10 h-10 rounded-2xl shadow-xl bg-white Textazul text-lg justify-center items-center">
                    <i class="fa-solid fa-users"></i>
            </div>
            <span class="text-xl text-gray-600 font-medium">Setores - {{$eventItem->name}} </span>

        </div>

        <button wire:click='typeForm' class="flex p-2 rounded-2xl justify-center items-center text-white BtnHover azul gap-2 w-1/2 md:w-1/6 font-medium  ">
            <i class="fa-solid fa-plus"></i>
            Cadastrar Setores
        </button>

    </div>



    
    <div class="flex w-full gap-15 mt-15 flex-wrap  justify-center ">
     
        @if($sectors)

            @php


                $arayViP = [];
                $arayIMP = [];
                $arayCOM = [];


                foreach ($sectors as $key => $value) {
                    
                    switch ($value->type_sector) {
                        case 'VIP':
                            $arayViP[]= $value;
                            break;
                        case 'IMP':
                            $arayIMP[]= $value;
                            break;
                        case 'COM':
                            $arayCOM[]= $value;
                            break;
                    }
                }
                
            @endphp



                @if (count($arayViP))
                    <div class="flex w-100 flex-col gap-5">

                        @foreach ($arayViP as $item)
                            <div class="flex z-[99] bg-white gap-5 p-5 rounded-2xl shadow-xl flex-col">

                                <div class="flex w-full justify-between">
                                    <div class="flex gap-2 items-center">

                                
                                    <div class="flex w-10 h-10 justify-center items-center rounded-full bg-[#f44528]/20 text-[#f44528] ">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <span class="flex text-xl text-gray-600">{{$item->name}}</span>
                                    </div>

                                    <div class="flex w gap-2">
                                        <button wire:click="typeForm({{$item->id}}, 'update')" class="flex w-10 h-10 BtnHover rounded-full justify-center items-center border-1 border-gray-500 border-dashed text-gray-600"><i class="fa-solid fa-pencil"></i></button>
                                        <button wire:click="delete({{$item->id}})" class="flex w-10 h-10 BtnHover rounded-full justify-center items-center border-1 border-rose-500 border-dashed text-rose-600"><i class="fa-solid fa-trash"></i></button>

                                    </div>
                                
                                </div>
                                <div class=" flex-col w-full flex gap-2">
                                    <span class="flex text-xl text-gray-600">Capacidade do setor: {{$item->capacity_ticket}}</span>
                                    <span class="flex text-xl font-medium text-[#f44528]">Qut. de ingressos reservados: {{$item->ticket_reserved}}</span>
                                </div>

                                @php


                                if($item->capacity_ticket != 0 or $item->capacity_ticket != 0 ){
                                    $calc = ($item->ticket_reserved* 100) / $item->capacity_ticket;

                                        if($calc >= 90){
                                            $critc = true;
                                        }
                                        
                                        else{
                                            $critc = false;
                                        }

                                    
                                }else{
                                $critc = false;
                                }


                                
                                @endphp

                                @if ($critc)

                                    <div class="flex w-full p-2 rounded-2xl bg-rose-100 font-medium text-rose-700 justify-center items-center text-xl">Setor Crítico</div>
                                    
                                @endif
                                </div>
                        @endforeach

                    
                    </div>
                @endif

                @if (count($arayIMP))
                    <div class="flex w-100 flex-col gap-5">

                        @foreach ($arayIMP as $item)
                            <div class="flex z-[99] bg-white gap-5 p-5 rounded-2xl shadow-xl flex-col">

                                <div class="flex w-full justify-between">
                                    <div class="flex gap-2 items-center">

                                
                                    <div class="flex w-10 h-10 justify-center items-center rounded-full bg-[#1331a1]/20 text-[#1331a1] ">
                                    <i class="fa-solid fa-camera"></i>
                                    </div>
                                    <span class="flex text-xl text-gray-600">{{$item->name}}</span>
                                    </div>

                                    <div class="flex w gap-2">
                                        <button wire:click="typeForm({{$item->id}}, 'update')" class="flex w-10 h-10 BtnHover rounded-full justify-center items-center border-1 border-gray-500 border-dashed text-gray-600"><i class="fa-solid fa-pencil"></i></button>
                                        <button wire:click="delete({{$item->id}})" class="flex w-10 h-10 BtnHover rounded-full justify-center items-center border-1 border-rose-500 border-dashed text-rose-600"><i class="fa-solid fa-trash"></i></button>

                                    </div>
                                
                                </div>
                                <div class=" flex-col w-full flex gap-2">
                                    <span class="flex text-xl text-gray-600">Capacidade do setor: {{$item->capacity_ticket}}</span>
                                    <span class="flex text-xl font-medium text-[#1331a1]">Qut. de ingressos reservados: {{$item->ticket_reserved}}</span>
                                </div>

                                @php
                                    
                                    if($item->capacity_ticket != 0 or $item->capacity_ticket != 0 ){
                                    $calc = ($item->ticket_reserved* 100) / $item->capacity_ticket;

                                        if($calc >= 90){
                                            $critc = true;
                                        }
                                        
                                        else{
                                            $critc = false;
                                        }

                                    
                                    }else{
                                    $critc = false;
                                    }

                                @endphp

                                @if ($critc)

                                    <div class="flex w-full p-2 rounded-2xl bg-rose-100 font-medium text-rose-700 justify-center items-center text-xl">Setor Crítico</div>
                                    
                                @endif
                                </div>
                        @endforeach

                    
                    </div>
                @endif
                @if (count($arayCOM))
                    <div class="flex w-100 flex-col gap-5">

                        @foreach ($arayCOM as $item)
                            <div class="flex z-[99] bg-white gap-5 p-5 rounded-2xl shadow-xl flex-col">

                                <div class="flex w-full justify-between">
                                    <div class="flex gap-2 items-center">

                                
                                    <div class="flex w-10 h-10 justify-center items-center rounded-full bg-[#a2ca02]/20 text-[#a2ca02] ">
                                    <i class="fa-solid fa-camera"></i>
                                    </div>
                                    <span class="flex text-xl text-gray-600">{{$item->name}}</span>
                                    </div>

                                    <div class="flex w gap-2">
                                        <button wire:click="typeForm({{$item->id}}, 'update')" class="flex w-10 h-10 BtnHover rounded-full justify-center items-center border-1 border-gray-500 border-dashed text-gray-600"><i class="fa-solid fa-pencil"></i></button>
                                        <button wire:click="delete({{$item->id}})" class="flex w-10 h-10 BtnHover rounded-full justify-center items-center border-1 border-rose-500 border-dashed text-rose-600"><i class="fa-solid fa-trash"></i></button>

                                    </div>
                                
                                </div>
                                <div class=" flex-col w-full flex gap-2">
                                    <span class="flex text-xl text-gray-600">Capacidade do setor: {{$item->capacity_ticket}}</span>
                                    <span class="flex text-xl font-medium text-[#a2ca02]">Qut. de ingressos reservados: {{$item->ticket_reserved}}</span>
                                </div>

                                @php
                                    
                                    if($item->capacity_ticket != 0 or $item->capacity_ticket != 0 ){
                                    $calc = ($item->ticket_reserved* 100) / $item->capacity_ticket;

                                        if($calc >= 90){
                                            $critc = true;
                                        }
                                        
                                        else{
                                            $critc = false;
                                        }

                                    
                                }else{
                                $critc = false;
                                }

                                @endphp

                                @if ($critc)

                                    <div class="flex w-full p-2 rounded-2xl bg-rose-100 font-medium text-rose-700 justify-center items-center text-xl">Setor Crítico</div>
                                    
                                @endif
                                </div>
                        @endforeach

                    
                    </div>
                @endif

            @else
                <div class="flex text-2xl text-gray-600">
                    Não há setores disponiveis

                </div>
            @endif

    </div>


    
    <x-modal
    NameModal="{{$updateFom ? 'Editar' : 'Cadastrar'}} Setor"
    :StatusMOdal=$showModal
    
    >


    <div class="flex w-full justify-center items-center">
        <span class="flex p-3 rounded-2xl bg-[#1331a1]/20 text-[#1331a1]">
            Quantidade restante de ingressos do evento: {{$ticketRestante}}
        </span>

    </div>

    <div class="flex w-full gap-5 md:flex-row flex-col  justify-between">
        <x-input
        label='Nome setor'
        model="form.name"
        type='text'
        placeholder='Setor VIP'
        
        />
        <x-input
        label='Capacidade do setor'
        model="form.capacity_ticket"
        type='number'
        placeholder='100'>

             @if(session('ErrorFormQuan'))
                <div wire:poll.3s class="flex text-red-700 text-lg">
                    {{session('ErrorFormQuan')}}
                </div>
            @endif
        </x-input>
        
        

    </div>
    <div class="flex w-full gap-5 justify-center">
         <div class="flex w-full flex-col gap-2">
            <label for="" class="flex text-lg text-gray-600 ">Nível do setor</label>
            <select wire:model='form.type_sector' name="" id="" class="flex w-full border-1 border-gray-300 rounded-2xl p-3 ">
                <option selected value="VIP">VIP</option>
                <option value="IMP">Imprensa</option>
                <option value="COM">Comum</option>
            </select>
             @error('form.type_sector')
                <div wire:poll.3s class="flex text-red-700 text-lg">
                    {{$message}}
                </div>
                    
            @enderror
            @if(session('ErrorForm'))
            <div class="flex text-red-700 text-lg">
                {{session('ErrorForm')}}
            </div>
            @endif

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
