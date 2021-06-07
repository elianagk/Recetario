<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear receta') }}
            </h2>
    </x-slot>
<!-- component -->


  <form action="{{ route('receta.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="Nombre" type="text" name="nombre" id="nombre_receta">

            @error('nombre')
              <small class="danger">{{$message}}</small>
            @enderror

        </div>
        <div class="form-group">
          <textarea class="description bg-gray-100 sec p-3 h-60 mt-3 mb-4 border border-gray-300 outline-none w-full" autocomplete="off" placeholder="Pasos de la receta" name="descripcion" id="pasos_de_la_receta"></textarea>
          @error('descripcion')
              <small class="danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
          <textarea class="description bg-gray-100 sec p-4 h-20 mt-3 mb-4 border border-gray-300 outline-none w-full" autocomplete="off" placeholder="Recomendaciones" name="recomendacion" id="recomendacion"></textarea>
        </div>
        <div class="form-group">
          <div class="md:w-1/3">
              <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="cantidad_comensales">
                Cantidad de comensales
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="cantidad_comensales" type="number" min="1" name="comensales">
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
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="dificultad" autocomplete="off" type="text"  name="dificultad">
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
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="tiempo-coccion" type="text" placeholder="Horas:Minutos:Segundos" autocomplete="off" name="tiempo_coccion">
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
                <input value="{{ $categoria->id_categoria}}" class="border-gray-300 p-2  outline-none mr-1" type="checkbox" name="categorias[]" id="{{$categoria->nombre}}">{{ $categoria->nombre}}
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
                          <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                          <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                              
                              <input id="file-upload"  type="file" class="form-control-file"  name="image" alt="file-name" id="imagen">
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                
          <!-- buttons -->
          
            
            <div class="form-group">
              <button class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " >Agregar Ingredientes</button>
            </div>
          
    </div>
  </form>
</x-app-layout>