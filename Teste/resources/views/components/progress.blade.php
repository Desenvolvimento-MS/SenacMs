@props(['Status1', 'Status2', 'Status3'])



<div class="flex w-full justify-between items-center">

    <div class="flex w-15 h-15 rounded-full justify-center items-center text-2xl  {{$Status1 ? 'bg-[#f31366] text-white' : 'bg-gray-100 text-gray-500'}}">
        <i class="fa-solid fa-ticket"></i>
    </div>

    <div class="flex w-1/3 h-2 rounded-2xl {{$Status1 ? 'bg-[#f31366] text-white' : 'bg-gray-100 text-gray-500'}}">
    </div>

    <div class="flex  w-15 h-15 rounded-full justify-center items-center text-2xl {{$Status2 ? 'bg-[#f31366] text-white' : 'bg-gray-100 text-gray-500'}}">
       <i class="fa-solid fa-user-group"></i>
    </div>

    <div class="flex w-1/3 h-2 rounded-2xl {{$Status3 ? 'bg-[#f31366] text-white' : 'bg-gray-100 text-gray-500'}}">
        </div>


    <div class="flex  w-15 h-15 rounded-full justify-center items-center text-2xl {{$Status3 ? 'bg-[#f31366] text-white' : 'bg-gray-100 text-gray-500'}}">
     <i class="fa-solid fa-download"></i>
    </div>

</div>