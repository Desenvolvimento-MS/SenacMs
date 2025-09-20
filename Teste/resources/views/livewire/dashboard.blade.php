<div>
        <div class="flex w-full gap-10 z-[50] flex-col  md:flex-row justify-between">

        <div class=" flex  gap-2 flex-1  items-center ">

            <div class="flex w-10 h-10 rounded-2xl shadow-xl bg-white Textazul text-lg justify-center items-center">
                  <i class="fa-solid fa-grip"></i>
            </div>
            <span class="text-xl text-gray-600 font-medium">Dashboard {{$eventItem ? '-' . $eventItem->name : ''}} </span> 
        </div>
        <div class="flex md:w-1/2 items-end flex-col gap-2">
                <label for="" class="flex md:w-1/4  text-lg text-gray-600 ">Filtrar por evento</label>
                <select wire:model.change="selectEvent"  name="" id="" class="flex md:w-1/4 border-1 border-gray-300 rounded-2xl p-3 ">
                    <option >Selecione uma opção</option>
                    @foreach ($events as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
        </div>
    </div>



  
    <div class="flex w-full flex-wrap  z-[50] gap-10 mt-15 justify-center items-center ">
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


        <div class="flex w-100 h-30  p-5 z-[50] rounded-2xl bg-white shadow-xl justify-center relative overflow-hidden items-center flex-col gap-3">
            <div class="
            flex text-2xl w-full justify-center ">
                <span class="text-lg text-rose-500 items-center gap-2 flex "><i class="fa-solid fa-triangle-exclamation"></i>Setores Esgotados</span>
            </div>
            <div class="flex w-full justify-center items-center">
            <div class="relative overflow-x-auto h-18">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Setor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Qut. Ingressos Reservados
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($setoresEsgotados)
                        @foreach ($setoresEsgotados as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <td class="px-6 py-4">
                                    {{$item->id}}
                                </td>
                                <td class="px-6 py-4">
                                       {{$item->name}}
                                </td>
                                <td class="px-6 py-4">
                                      {{$item->ticket_reserved}}
                                </td>
                            </tr>
                                
                        @endforeach
                        @endif
                        
                    
                    </tbody>
                </table>
            </div>


            </div>

        </div>
    </div>


    <div class="flex w-full gap-5 justify-between flex-col  md:flex-row  mt-15">

        <div class="flex flex-1 justify-center flex-wrap ">


            <div class="flex  md:w-1/2 flex-col gap-4">
                <span class="text-xl text-gray-600 font-medium">Capacidade dos Setores</span>
                <div class="flex w-full" id="chart"></div>
            </div>

            <div class="flex md:w-1/2 items-end flex-col gap-4">
                <span class="text-xl text-gray-600 font-medium">Status dos ingressos ( Validados e Emitidos)</span>
                <div id="chart2"></div>
            </div>



        </div>




        <div class="flex md:w-1/3  justify-center md:justify-end">
            <div class="flex md:w-[80%] p-5 justify-center rounded-2xl bg-[#1331a1]/20 flex-col gap-5">

            <div class="flex justify-center items-center rounded-2xl p-3 text-gray-600 bg-white text-xl tetx-gray-600 font-medium">
                Capacidade dos Setores
            </div>


            <div class="flex flex-col gap-5 overflow-x-auto h-80">
                @if($setores)
                    @foreach ($setores as $item)


                    @php

                    switch ($item->type_sector) {
                        case 'VIP':
                            $color = "bg-[#f44528]";
                            $icon = 'fa-star';
                            $text = 'text-[#f44528]';
                            break;
                        case 'IMP':
                            $color = "bg-[#1331a1]";
                            $icon = 'fa-camera';
                            $text = 'text-[#1331a1]';
           
                            break;
                        case 'COM':
                           $color = "bg-[#a2ca02]";
                            $icon = 'fa-user-group';
                            $text = 'text-[#a2ca02]';
                    
                            break;
                    }
                        

                    $calc = ($item->ticket_reserved* 100) / $item->capacity_ticket;


                    if($calc >= 90 and $calc <= 100){

                        $critic = true;
                    }else{
                         $critic = false;
                    }
        

                    
                    @endphp

                    <div class="flex bg-white p-5 rounded-2xl  z-[999]">

                        <div class="flex w-full flex-col gap-5">
                            <div class="flex items-center gap-2 ">
                                <div class="flex w-10 h-10 rounded-full text-xl justify-center items-center {{$text}} {{$color}}/20">
                                    <i class="fa-solid {{$icon}}"></i>

                                </div>
                                <span class="flex  text-xl text-gray-600">{{$item->name}}</span>
                            </div>

                            <div class="flex w-full  relative">

                                <div class="flex  h-4 rounded-2xl bg-gray-200 w-full"></div>

                                <div style="width: {{$calc}}%" class="flex absolute h-4 rounded-2xl {{$color}} "></div>

                            </div>

                            <div class="flex gap-5 w-full">

                                <div class="flex  flex-col gap-2 text-center justify-center items-center">
                                    <span class="flex text-center text-md text-gray-400 font-normal">Capacidade do setor</span>
                                    <span class="flex text-center text-2xl text-gray-600 font-medium">{{$item->capacity_ticket}}</span>
                                
                                </div>
                                <div class="flex flex-col gap-2 text-center justify-center items-center">
                                    <span class="flex text-center text-md text-gray-400 font-normal">Ingressos Reservados</span>
                                    <span class="flex text-center text-2xl text-gray-600 font-medium">{{$item->ticket_reserved}}</span>
                                
                                </div>

                            </div>
                            
                        </div>

                    </div>
                        
                    @endforeach
                @endif

            </div>

        </div>

        </div>

        

    </div>


       <img class="fixed bottom-0 right-20 z-[10]" src="{{asset('image/Group 104.png')}}" alt="">


    
</div>


@php
    
    $SectorLabel =  $sectorLabel;
    $SectorValues = $sectorValue;


    $Validados = $totalValidado;
    $NãoValidados = $totalNãoValidado;

    $totalValidArray = $ArryTitcketDados ? $ArryTitcketDados : [];




    
@endphp


@script

<script>
    
     const options = {
          series: [{
          data: {!!json_encode($SectorValues)!!}
        }],
          chart: {
          height: 350,
          width:600,
          type: 'bar',
          events: {
            click: function(chart, w, e) {
              // console.log(chart, w, e)
            }
          }
        },
      
        plotOptions: {
          bar: {
            columnWidth: '45%',
            distributed: true,
          }
        },

         responsive: [{
          breakpoint: 500,
          options: {
            chart: {
              width: 400,
            },
            legend: {
              position: 'bottom'
            }
          }
        }],
        dataLabels: {
          enabled: false
        },
        colors: ['#f44528','#1331a1','#a2ca02','#f8b62f','#f31366'],
        legend: {
          show: false
        },
        xaxis: {
          categories: {!!json_encode($SectorLabel)!!} 
          ,
        
        }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



         
        const options2 = {
          series: {!!json_encode($totalValidArray)!!}  ,
          chart: {
            type: 'donut',
            width: 500,
        },
        labels: ['Ingresso Validados', 'Ingresso Não Validados'],
        colors: ['#a2ca02','#f31366'],
        responsive: [{
          breakpoint: 500,
          options: {
            chart: {
              width: 400,
            },
            legend: {
              position: 'bottom'
            }
          }
        }],

        };

        const chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
        chart2.render();
      
      
</script>


@endscript