<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $ingredientes->nombre }}
            </h2>
    </x-slot>


<div class="w-2/3 mx-auto">
  <div class="bg-purple-100 shadow-md rounded my-6">
    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Recetas</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Acciones</th>
          
        </tr>
      </thead>
      <tbody>
          
            @foreach ($recetas as $receta)
            <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">{{$receta->nombre}}</td>
                <td class="py-4 px-6 border-b border-grey-light">
                    <a href="{{route('receta.show', ['id' => $receta->id_receta])}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark"><i class="fa fa-search mr-1"></i>Ver</a>
                </td>
                </tr>
            @endforeach
           
      </tbody>
    </table>
  </div>
</div>
</x-app-layout>