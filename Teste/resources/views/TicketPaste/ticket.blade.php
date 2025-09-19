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
<body class="flex overflow-hidden bg-[#F44528]">


    <div class="flex w-full bg-[#F44528] z-[99] p-5 flex-col gap-5 ">

        <div class="flex text-2xl text-white  z-[99] gap-3 w-full justify-center items-center">
            <i class="fa-solid fa-star"></i>
            VIP
        </div>
        <div class="flex bg-white  h-100 z-[99] rounded-2xl flex-col  gap-10 p-5">

            <div class="flex flex-col gap-2 w-full justify-center items-center">
                <span class="text-gray-500 text-lg">Lucas Maia</span>
                <span class="flex text-[#F44528]  font-medium  text-2xl">JL453K3H45K3</span>
            </div>


            <div class="flex w-full relative">

                <div class="flex w-15 absolute  z-[99] -top-7 -left-15  h-15 bg-[#F44528] rounded-full"></div>
                <div class="flex w-full border-1 border-dashed border-[#F44528]"></div>
                 <div class="flex w-15 absolute -top-7 -right-15  h-15 bg-[#F44528] rounded-full"></div>
            </div>

            <div class="flex w-full flex-col  z-[99] gap-3 justify-center items-center">
                 <span class="text-gray-500 text-2xl font-semibold ">Grande showe Senac</span>
                 <span class="text-gray-500 text-center text-md ">GRua Venânciu Aires,353, Centro, Brásilia</span>
            </div>

             <div class="flex w-full  z-[99] relative">

                <div class="flex w-15 absolute -top-7 -left-15  h-15 bg-[#F44528] rounded-full"></div>
                <div class="flex w-full border-1 border-dashed border-[#F44528]"></div>
                 <div class="flex w-15 absolute -top-7 -right-15  h-15 bg-[#F44528] rounded-full"></div>
            </div>

            <div class="flex  w-full justify-between items-center">

                <div class="flex justify-center items-center flex-col text-center gap-1">
                    <span class="flex text-md font-medium text-gray-400">Data</span>
                    <span class="text-lg text-gray-600">Data</span>
                </div>
                <div class="flex justify-center items-center flex-col text-center gap-1">
                    <span class="flex text-md font-medium text-gray-400">Setor</span>
                    <span class="text-lg text-gray-600">Data</span>
                </div>
                <div class="flex justify-center items-center flex-col text-center gap-1">
                    <span class="flex text-md font-medium text-gray-400">Horário</span>
                    <span class="text-lg text-gray-600">Data</span>
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