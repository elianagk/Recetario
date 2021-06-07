<?php $busqueda = "" ?>
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Recetas') }}
    </h2>
  </x-slot>

  <x-slot name="slot">
    @if(Session::has('error'))
    <div class="alert alert-danger " >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
      </button>
      <strong>Permiso denegado</strong> No tiene permisos para acceder a esta ruta.
    </div>
    @endif
    <!-- Container lo que hace es ir cambiando el tamano de la pantalla -->
    <!-- component -->
    <div class="bg-purple-100 shadow-md rounded my-6 place-items-center w-2/3 mx-auto">
      @auth
      @if(Auth::user()->hasRole('recipe_creator'))
      <a href="{{route('receta.create')}}" class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mb-2 ">Crear</a>
      @endif
      @endauth
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre" title="Ingresar nombre">
    </div>
    <div class="w-2/3 mx-auto" id="myTable">
      <div class="bg-purple-100 shadow-md rounded my-6">
        <table class="text-left w-full border-collapse">
          <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
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

              <td class="py-4 px-6 border-b border-grey-light md:flex flex-row-3">
                <a href="{{route('receta.show', ['id' => $receta->id_receta])}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Ver</a>
                @auth
                @if(Auth::user()->id == $receta->user_id || Auth::user()->hasRole('admin'))
                  @if(Auth::user()->hasRole('recipe_creator'))
                    <a href="{{route('receta.edit', ['id' => $receta->id_receta])}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Editar</a>
                  @endif
                  <form action="{{ route('receta.destroy', ['id' => $receta->id_receta]) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark" type="submit">Eliminar</button>
                  </form>
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