<div>
   


    <div class="flex w-full z-[50] justify-between">

        <div class=" flex  gap-2 justify-between items-center ">

            <div class="flex w-10 h-10 rounded-2xl shadow-xl bg-white Textazul text-lg justify-center items-center">
                    <i class="fa-solid fa-users"></i>
            </div>
            <span class="text-xl text-gray-600 font-medium">Usuários</span>

        </div>

        <button wire:click='typeForm' class="flex p-2 rounded-2xl justify-center items-center text-white BtnHover azul gap-2 w-1/2 md:w-1/6 font-medium  ">
            <i class="fa-solid fa-plus"></i>
            Cadastrar Usuário
        </button>

    </div>


    <div class="flex w-full  z-[50] gap-10 mt-15 justify-center items-center flex-wrap">
        <x-card
            NameCard='Total de Usuários'
            :ValudCard=$totalUser
        
        />
        <x-card
            NameCard='Total de Administradores'
            :ValudCard=$totalAdm
        
        />
        <x-card
            NameCard='Total de Vendedores'
            :ValudCard=$totalSaller
        
        />
        <x-card
            NameCard='Total de Validadores'
            :ValudCard=$totalCheck
        
        />
    </div>





    <div class="flex w-full bg-white z-[50] mt-15 gap-5 flex-col rounded-2xl shadow-xl p-5">

        
    <div class="flex w-full gap-2 bg-white z-[50] ">

        <div class="flex w-10 h-10 bg-blue-100 text-blue-800 rounded-full justify-center items-center ">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <input wire:model.live="search" placeholder="Pesquisar Usuário"  type="text" class="flex w-full md:w-1/4 border-1 border-gray-300 rounded-2xl p-2 ">

    </div>

    <div class="relative z-[50] overflow-x-auto h-60">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome Usuário
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Perfil
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->name}}     {{$item->lastname}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->profile}}
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
    NameModal="{{$updateFom ? 'Editar' : 'Cadastrar'}} Usuário"
    :StatusMOdal=$showModal
    
    >

    <div class="flex w-full gap-5 justify-between">
        <x-input
        label='Nome'
        model="form.name"
        type='text'
        placeholder='Rafael'
        
        />
        <x-input
        label='Sobrenome'
        model="form.lastname"
        type='text'
        placeholder='Rodrigues'
        
        />

    </div>
    <div class="flex w-full gap-5 justify-between">
        <x-input
        label='CPF'
        model="form.cpf"
        type='text'
        xmask='999.999.999-99'
        placeholder='999.999.999-99'
        
        />
        <x-input
        label='E-mail'
        model="form.email"
        type='email'
        placeholder='rafa@gmail.com'
        
        />

    </div>
    
    <div class="flex w-full gap-5 justify-between">
        <div class="flex w-full flex-col gap-2">
            <label for="" class="flex text-lg text-gray-600 ">Perfil</label>
            <select wire:model='form.profile' name="" id="" class="flex w-full border-1 border-gray-300 rounded-2xl p-3 ">
                <option selected value="Adm">Administrador</option>
                <option value="Saller">Vendedor</option>
                <option value="Check">Validador</option>
            </select>
             @error('form.profile')
                <div class="flex text-red-700 text-lg">
                    {{$message}}
                </div>
                    
            @enderror
            @if(session('ErrorForm'))
            <div class="flex text-red-700 text-lg">
                {{session('ErrorForm')}}
            </div>
            @endif

        </div>
        <x-input
        label='Senha'
        model="form.password"
        type='password'
        placeholder='********'
        
        />

    </div>

    <div class="flex w-full mt-10 justify-center items-center gap-5">

        <button wire:click='closeModal' class="flex p-2 rounded-2xl w-1/2 BtnHover bg-red-100 text-rose-600 justify-center items-center">Cancelar</button>
        <button  wire:click='{{$updateFom ? 'update' : 'register'}}'  class="flex p-2 rounded-2xl w-1/2 BtnHover bg-green-100 text-green-600 justify-center items-center">{{$updateFom ? 'Editar' : 'Cadastrar'}}</button>
    </div>
    




    </x-modal>

    <x-alert/>


    <img class="fixed bottom-0 right-20 z-[10]" src="{{asset('image/Group 104.png')}}" alt="">


</div>
