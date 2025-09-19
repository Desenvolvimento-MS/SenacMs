<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


         @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

@php

    switch ($sector->type_sector) {
        case 'VIP':
            
            $icon = '<i class="fa-solid fa-star"></i>';
            break;
            $color = 'bg-[#f44528]';
            $text = 'text-[#f44528]';
            $border = 'border-[#f44528]';
            break;
        case 'IMP':
            $icon = '<i class="fa-solid fa-camera"></i>';
            $color = 'bg-[#1331a1]';
            $text = 'text-[#1331a1]';
              $border = 'border-[#1331a1]';
            break;
        case 'COM':
             $icon = '<i class="fa-solid fa-user-group"></i>';
            $color = 'bg-[#a2ca02]';
            $text = 'text-[#a2ca02]';
            $border = 'border-[#a2ca02]';
            break;
    
    }
    

@endphp


<body class="flex overflow-hidden {{$color}} ">


    <div class="flex w-full {{$color}} z-[99] p-5 flex-col gap-5 ">

        <div class="flex text-2xl text-white  z-[99] gap-3 w-full justify-center items-center">
             { !! $icon !!}
            {{$sector->type_sector}}
        </div>
        <div class="flex bg-white  h-100 z-[99] rounded-2xl flex-col  gap-10 p-5">

            <div class="flex flex-col gap-2 w-full justify-center items-center">
                <span class="text-gray-500 text-lg">  {{$client->name}}   {{$client->lastname}}</span>
                <span class="flex  {{$text}}  font-medium  text-2xl">  {{$ticket->code_ticket}}</span>
            </div>


            <div class="flex w-full relative">

                <div class="flex w-15 absolute  z-[99] -top-7 -left-15  h-15  {{$color}} rounded-full"></div>
                <div class="flex w-full border-1 border-dashed {{$border}} "></div>
                 <div class="flex w-15 absolute -top-7 -right-15  h-15  {{$color}}rounded-full"></div>
            </div>

            <div class="flex w-full flex-col  z-[99] gap-3 justify-center items-center">
                 <span class="text-gray-500 text-2xl font-semibold "> {{$event->name}}</span>
                 <span class="text-gray-500 text-center text-md "> {{$event->endereco_event}}</span>
            </div>

             <div class="flex w-full  z-[99] relative">

                <div class="flex w-15 absolute -top-7 -left-15  h-15  {{$color}} rounded-full"></div>
                <div class="flex w-full border-1 border-dashed  {{$border}}"></div>
                 <div class="flex w-15 absolute -top-7 -right-15  h-15  {{$color}} rounded-full"></div>
            </div>

            <div class="flex  w-full justify-between items-center">

                <div class="flex justify-center items-center flex-col text-center gap-1">
                    <span class="flex text-md font-medium text-gray-400">Data</span>
                    <span class="text-lg text-gray-600">{{\Carbon\Carbon::parse($event->date_event)->format('d/m/Y')}}</span>
                </div>
                <div class="flex justify-center items-center flex-col text-center gap-1">
                    <span class="flex text-md font-medium text-gray-400">Setor</span>
                    <span class="text-lg text-gray-600">{{$sector->name}}</span>
                </div>
                <div class="flex justify-center items-center flex-col text-center gap-1">
                    <span class="flex text-md font-medium text-gray-400">Horário</span>
                    <span class="text-lg text-gray-600">{{\Carbon\Carbon::parse($event->time_event)->format('H:i')}}</span>
                </div>

            </div>
        </div>

        <i class="fa-solid text-[150px]  z-[99] text-white pr-15 fa-qrcode"></i>


        <img class="flex fixed bottom-5  z-[99] right-0 h-70" src="{{asset('image/Logo - Isotipo Branco.png')}}" alt="">

        <img class="flex fixed bottom-60 z-[10] right-0 h-70" src="{{asset('image/Vector 15.png')}}" alt="">
        <img class="flex fixed bottom-0 z-[10] -left-20 h-70" src="{{asset('image/Vector 14.png')}}" alt="">
        <img class="flex fixed bottom-70 z-[10] -left-20 h-70" src="{{asset('image/Vector 13.png')}}" alt="">
        <img class="flex fixed -top-10 z-[10] left-0 h-70" src="{{asset('image/Vector 12.png')}}" alt="">





    </div>
    
</body>
</html>