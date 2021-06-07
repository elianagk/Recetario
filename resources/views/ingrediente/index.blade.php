<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ingredientes') }}
            </h2>
            
    </x-slot>

        <!-- Container lo que hace es ir cambiando el tamano de la pantalla -->
        <!-- component -->

<x-slot name="slot">
  <div class="bg-purple-100 shadow-md rounded my-6 place-items-center w-2/3 mx-auto">
  @auth
  @if(Auth::user()->hasRole('admin'))
    <a href="{{route('ingrediente.create')}}" class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mb-2 ">Crear</a>
  @endif
  @endauth
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre" title="Ingresar nombre">
  </div>
  <div class="w-2/3 mx-auto">
    <div class="bg-purple-100 shadow-md rounded my-6">
      <table class="text-left w-full border-collapse table" id="myTable"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
        <thead>
          <tr>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Ingredientes</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Acciones</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($ingredientes as $ingrediente)
          <tr class="hover:bg-grey-lighter">
            <td class="py-4 px-6 border-b border-grey-light">{{$ingrediente->nombre}}</td>
            
                <td class="py-4 px-6 border-b border-grey-light md:flex flex-row-3">
                  <a href="{{route('ingrediente.show', ['id' => $ingrediente->id_ingrediente])}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark"><i class="fa fa-search mr-1"></i>Ver</a>			    					
                  @auth
                    @if(Auth::user()->hasRole('admin'))
                      <a href="{{route('ingrediente.edit', ['id' => $ingrediente->id_ingrediente])}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark"><i class="fa fa-pencil mr-1"></i>Editar</a>
                     
                    @endif
                  @endauth
                </td>
            
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

 
</x-slot>
</x-app-layout>