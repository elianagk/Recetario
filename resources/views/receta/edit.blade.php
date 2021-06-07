<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $receta->nombre }}
    </h2>
  </x-slot>
  <!-- component -->

  <form action="{{ route('receta.update', ['id' => $receta->id_receta]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
      <div class="form-group">
        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="Nombre" type="text" name="nombre" value="{{$receta->nombre}}" id="nombre_receta">

        @error('nombre')
        <small class="danger">{{$message}}</small>
        @enderror

      </div>
      <div class="form-group">
        <textarea class="description bg-gray-100 sec p-3 h-60 mt-3 mb-4 border border-gray-300 outline-none w-full" autocomplete="off" placeholder="Pasos de la receta" name="descripcion" id="pasos_de_la_receta">{{$receta->descripcion}}</textarea>
        @error('descripcion')
        <small class="danger">{{$message}}</small>
        @enderror
      </div>
      <div class="form-group">
        <textarea class="description bg-gray-100 sec p-4 h-20 mt-3 mb-4 border border-gray-300 outline-none w-full" autocomplete="off" placeholder="Recomendaciones" name="recomendacion" id="recomendacion">{{$receta->recomendacion}}</textarea>
      </div>
      <div class="form-group">
        <div class="md:w-1/3">
          <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="cantidad_comensales">
            Cantidad de comensales
          </label>
        </div>
        <div class="md:w-2/3">
          <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="cantidad_comensales" type="number" min="1" name="comensales" value="{{$receta->comensales}}">
        </div>
        @error('comensales')
        <small class="danger">{{$message}}</small>
        @enderror
      </div>
      <div class="form-group">
        <div class="md:w-1/3">
          <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="dificultad">
            Dificultad de la receta
          </label>
        </div>
        <div class="md:w-2/3">
          <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="dificultad" autocomplete="off" type="text" name="dificultad" value="{{$receta->dificultad}}">
        </div>
        @error('dificultad')
        <small class="danger">{{$message}}</small>
        @enderror
      </div>

      <div class="form-group">
        <div class="md:w-1/3">
          <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="tiempo-coccion">
            Tiempo de coccion
          </label>
        </div>
        <div class="md:w-2/3">
          <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="tiempo-coccion" type="text" autocomplete="off" name="tiempo_coccion" value="{{$receta->tiempo_coccion}}">
        </div>
        @error('tiempo_coccion')
        <small class="danger">{{$message}}</small>
        @enderror
      </div>




      <label class="title  border-gray-300 p-2  outline-none" for="label-categoria">
        Categoria
      </label>
      <div class="form-group mb-3 ">
        @foreach ($categorias as $categoria)
        <label for="{{$categoria->nombre}}">
          <input value="{{ $categoria->id_categoria}}" class="border-gray-300 p-2  outline-none mr-1 " type="checkbox" name="categorias[]" @if(in_array($categoria, $categoriasChecked)) checked @endif>{{ $categoria->nombre}}
        </label>
        @endforeach
        @error('id_categoria')
        <small class="danger">{{$message}}</small>
        @enderror
      </div>

      <!-- imagen -->
      <div>
        <label class="title  border-gray-300 p-2 mb-4 outline-none">
          Cargue una foto!
        </label>
        <div class="form-group">
          <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
              @if($receta->image)
              <div class="form-group">
                <img class="mw-100  " src="/imagenes/{{$receta->id_receta}}.jpg" alt="{{$receta->nombre}}">
              </div>
              @endif
              <div class="flex text-sm text-gray-600">
                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                  <input id="file-upload" type="file" class="form-control-file" name="image" alt="file-name" id="imagen">
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- buttons -->


      <div class="form-group">
        <button type="submit" class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " name="action">Guardar</button>
      </div>

    </div>
  </form>
  <div class="editor mx-auto w-10/12 flex flex-col-3 text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
    <form action="{{ route('recetaIngrediente.edit', ['id' => $receta->id_receta]) }}" method="GET" enctype="multipart/form-data">
      @csrf
      <button class="shadow bg-purple-900 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mb-1 ml-1">Editar Ingredientes</button>
    </form>

    <form action="{{ route('receta.index') }}" method="GET" enctype="multipart/form-data">
      @csrf
      <button class="shadow bg-purple-900 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mb-1 ml-1">Cancelar</button>
    </form>

    <form action="{{ route('receta.index') }}" method="GET" enctype="multipart/form-data">
      @csrf
      <button class="shadow bg-purple-900 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mb-1 ml-1">Listo</button>
    </form>


  </div>
</x-app-layout>