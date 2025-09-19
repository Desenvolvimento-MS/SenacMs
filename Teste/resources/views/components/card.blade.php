@props(['NameCard', 'ValudCard'])


<div class="flex  w-100 p-5 z-[50] rounded-2xl bg-white shadow-xl justify-center relative overflow-hidden items-center flex-col gap-3">

    <span class="flex text-gray-600 text-xl">{{$NameCard}}</span>
    <span class="flex text-2xl Textrosa">{{$ValudCard}}</span>

    <img class="flex absolute h-15 rotate-120 -bottom-2 right-20 " src="{{asset('image/Vector 1 (1).svg')}}" alt="">

    <img class="flex absolute h-15 -rotate-70 -top-6  left-20 " src="{{asset('image/Vector 9.png')}}" alt="">

</div>