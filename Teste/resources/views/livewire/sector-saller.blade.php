<div>
  <div>
   
    <div class="flex w-full z-[50] justify-between">

        <div class=" flex  gap-2 justify-between items-center ">

            <div class="flex w-10 h-10 rounded-2xl shadow-xl bg-white Textazul text-lg justify-center items-center">
                    <i class="fa-solid fa-users"></i>
            </div>
            <span class="text-xl text-gray-600 font-medium">Setores - {{$eventItem->name}} </span>

        </div>
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

        
                                
                                </div>
                                <div class=" flex-col w-full flex gap-2">
                                    <span class="flex text-xl text-gray-600">Capacidade do setor: {{$item->capacity_ticket}}</span>
                                    <span class="flex text-xl font-medium text-[#f44528]">Qut. de ingressos reservados: 50{{$item->ticket_reserved}}</span>
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

                                         if($item->capacity_ticket == $item->ticket_reserved){

                                    $block = true;
                                }else{
                                    $block = false;
                                }

                                    
                                }else{
                                $critc = false;
                                }


                               


                                
                                @endphp

                                @if($block)

                                <div class="flex w-full justify-center items-center p-2 rounded-2xl bg-rose-100 text-rose-700 ">
                                    Setor indisponivel
                                </div>

                                @else

                                <button wire:click='showReserva({{$item->id}})' class="flex p-2 rounded-2xl border-1 border-gray-300 justify-center items-center text-gray-600 text-xl cursor-pointer hover:bg-gray-100 transition-all ">Reservar Ingressos</button>

                                @endif

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

                                    
                                
                                </div>
                                <div class=" flex-col w-full flex gap-2">
                                    <span class="flex text-xl text-gray-600">Capacidade do setor: {{$item->capacity_ticket}}</span>
                                    <span class="flex text-xl font-medium text-[#1331a1]">Qut. de ingressos reservados: 50{{$item->ticket_reserved}}</span>
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

                                         if($item->capacity_ticket == $item->ticket_reserved){

                                    $block = true;
                                }else{
                                    $block = false;
                                }

                                    
                                }else{
                                $critc = false;
                                }

                                @endphp

                                @if($block)

                                <div class="flex w-full justify-center items-center p-2 rounded-2xl bg-rose-100 text-rose-700 ">
                                    Setor indisponivel
                                </div>

                                @else

                                <button wire:click='showReserva({{$item->id}})' class="flex p-2 rounded-2xl border-1 border-gray-300 justify-center items-center text-gray-600 text-xl cursor-pointer hover:bg-gray-100 transition-all ">Reservar Ingressos</button>

                                @endif

                                

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
                                
                                </div>
                                <div class=" flex-col w-full flex gap-2">
                                    <span class="flex text-xl text-gray-600">Capacidade do setor: {{$item->capacity_ticket}}</span>
                                    <span class="flex text-xl font-medium text-[#a2ca02]">Qut. de ingressos reservados: 50{{$item->ticket_reserved}}</span>
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

                                         if($item->capacity_ticket == $item->ticket_reserved){

                                    $block = true;
                                }else{
                                    $block = false;
                                }

                                    
                                }else{
                                $critc = false;
                                }

                                @endphp


                                @if($block)

                                <div class="flex w-full justify-center items-center p-2 rounded-2xl bg-rose-100 text-rose-700 ">
                                    Setor indisponivel
                                </div>

                                @else

                                <button wire:click='showReserva({{$item->id}})' class="flex p-2 rounded-2xl border-1 border-gray-300 justify-center items-center text-gray-600 text-xl cursor-pointer hover:bg-gray-100 transition-all ">Reservar Ingressos</button>

                                @endif

                                

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



    
    <x-alert/>



    <x-modal

    NameModal="Reservar Ingressos - {{ $sectorItem ? $sectorItem->name : ''}}"
    :StatusMOdal=$showModal
        :RegisterCLiete=$RegisterCLietShow

    >

    <div class="flex w-full justify-center  flex-col gap-5 items-center">


    @if ($ticketStatsu)
    <div class="flex w-1/2 mt-3 justify-center items-center">
        <x-input
                label='Quantidade de Ingressos para reservar'
                model="ticketQuantity"
                type='number'
                placeholder='3'
            
                
        />
    </div>

    <button wire:click="FuncshowCliente" class="flex BtnHover justify-center mt-5 items-center w-1/2 p-2 rounded-2xl bg-green-100 text-green-700 font-medium text-lg">Escolher Cliente</button>
        
    @endif


    @if ($showCliente)


         <div  class="flex w-1/2 flex-col gap-2">
            <label for="" class="flex text-lg text-gray-600 ">Selecione um cliente para receber os ingressos</label>
            <select wire:model.change="selectClient" class="flex   w-full border-1 border-gray-300 rounded-2xl p-3 ">
               <option value="">Selecione um cliente</option>

               @foreach ($clients as $item)
               <option value="{{$item->id}}">{{$item->name}} {{$item->lastname}}</option>
                   
               @endforeach
            </select>
             @error('selectClient')
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


        <button wire:click='BtnFN' class="flex BtnHover justify-center mt-5 items-center w-1/2 p-2 rounded-2xl bg-green-100 text-green-700 font-medium text-lg">Gerar Ingressos</button>
        
    @endif
    
   

    </div>

    

    </x-modal>


    <img class="fixed bottom-0 right-20 z-[10]" src="{{asset('image/Group 104.png')}}" alt="">


</div>



<x-modal
    :StatusMOdal=$showModalCLient
    NameModal='Cadastrar Cliente'
> 

 <div class="flex w-full gap-5 md:flex-row flex-col  justify-between">
        <x-input
        label='Nome'
        model="name"
        type='text'
        placeholder='Rafael'
        
        />
        <x-input
        label='Sobrenome'
        model="lastname"
        type='text'
        placeholder='Rodrigues'
        
        />

    </div>
    <div class="flex w-full gap-5 md:flex-row flex-col  justify-between">
        <x-input
        label='CPF'
        model="cpf"
        type='text'
        xmask='999.999.999-99'
        placeholder='999.999.999-99'
        
        />
        <x-input
        label='E-mail'
        model="email"
        type='email'
        placeholder='rafa@gmail.com'
        
        />

    </div>

    <div class="flex w-full mt-10 justify-center items-center gap-5">

        <button wire:click='closeModalRegister' class="flex p-2 rounded-2xl w-1/2 BtnHover bg-red-100 text-rose-600 justify-center items-center">Cancelar</button>
        <button  wire:click='registerCLient'  class="flex p-2 rounded-2xl w-1/2 BtnHover bg-green-100 text-green-600 justify-center items-center">{{$updateFom ? 'Editar' : 'Cadastrar'}}</button>
    </div>




</x-modal>




@if ($modalGerarTicket)

<div wire:poll="verificarTicketGerado" class=" flex inset-0 z-[99] fixed bg-black/20 justify-center items-center">


     <div class="flex w-100 md:w-140  bg-white p-10 rounded-2xl flex-col gap-5">

        <div class="flex justify-center flex-col gap-5 w-full items-center">
             <svg aria-hidden="true" class="w-20 h-20 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
        <span class="sr-only">Loading...</span>

            <span class="flex text-2xl text-gray-600">Gerando Ingressos...</span>

        </div>
        
    

     </div>


</div>
    
@endif


</div>




@script


<script>


    Livewire.hook('morphed', () =>{

        function LoadClient(){
            $('.select3').select2().on('change', function(){
                let value = $(this).val();

                console.log($value);
                $wire.set('selectClient', $value)
            })
        }

        LoadClient()
    })

</script>

@endscript