<?php $recomendacion = $receta->recomendacion?>
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $receta->nombre }}
            </h2>
    </x-slot>


    <div class="w-2/3 mx-auto  ">
      <div class=" bg-white shadow-md rounded my-6 w-auto ">
        <table class=" table-auto flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 "> 
          <thead>
            
          </thead>
          <tbody>
              
                
                <tr class="hover:bg-grey-lighter lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-3 lg:mb-0">
                    <td class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light ">Nombre</td> 
                    <td class="py-4 px-6 border-b border-grey-light">{{$receta->nombre}}</td>
                </tr>
                <tr class="hover:bg-grey-lighter lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-3 lg:mb-0 lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-3 lg:mb-0">
                    <td class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light ">Descripcion</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{$receta->descripcion}}</td>
                </tr>    
                
                    @if( $recomendacion != null)
                    <tr class="hover:bg-grey-lighter lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-3 lg:mb-0">
                        <td class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Recomendacion</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$receta->recomendacion}}</td>
                    </tr>
                    @endif
                <tr class="hover:bg-grey-lighter lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-3 lg:mb-0">
                    <td class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Comensales</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{$receta->comensales}}</td>
                </tr>    
                <tr class="hover:bg-grey-lighter lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-3 lg:mb-0">
                    <td class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Tiempo de Coccion</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{$receta->tiempo_coccion}}</td>
                </tr>    
                <tr class="hover:bg-grey-lighter lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-3 lg:mb-0">
                    <td class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Dificultad</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{$receta->dificultad}}</td>
                </tr>    
                <tr class="hover:bg-grey-lighter lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-3 lg:mb-0">
                    <td class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Categoria</td>
                   
                    <td class="py-4 px-6 border-b border-grey-light ">
                    @foreach($categorias as $categoria)
                    {{$categoria->nombre}}-
                    @endforeach
                    </td>
                </tr>    
                
              
          </tbody>
        </table>
    </div>



    <div class="bg-white shadow-md rounded my-6">
      <table class="text-left w-full "> 
        <thead>
            <tr>
              <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Ingrediente</th>
              <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Cantidad</th>
              
            </tr>
          </thead>
          <tbody >
              
                @foreach ($ingredientes as $ingrediente)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">{{$ingrediente->nombre}}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{$cantidades[$ingrediente->nombre]}}</td>
                </tr>
              
              @endforeach
                
              
          </tbody>
      </table>
  </div>
</div>
<div class="md:flex flex-row-2 w-2/3 mx-auto lg:mb-2 md:mb-2 sm:mb-2">
    @if($receta->image)
      <div class="md:w-full">
            <img class="mw-100  " src="/imagenes/{{$receta->id_receta}}.jpg" alt="{{$receta->nombre}}">
      </div>
    @endif
@auth
@if(Auth::user()->id == $receta->user_id)
  @if(Auth::user()->hasRole('recipe_creator'))
    <div >
      <a href="{{route('receta.edit', ['id' => $receta->id_receta])}}" class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-2 "><i class="fa fa-pencil mr-1"></i>Editar</a>
    </div>
  @endif
@endif
@endauth
</div>


</x-app-layout>