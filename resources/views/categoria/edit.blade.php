<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $categoria->nombre }}
        </h2>
    </x-slot>



    <div>

        <form action="{{ route('categoria.update', ['id' => $categoria->id_categoria]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">

                <div class="form-group">
                    <label for="nombre">
                        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" placeholder="Nombre" type="text" value="{{$categoria->nombre}}" name="nombre" id="nombre">
                    </label>
                    @error('nombre')
                    <small class="danger">{{$message}}</small>
                    @enderror
                </div>



                <!-- buttons -->


                <div class="form-group">
                    <button class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded ">Guardar</button>
                </div>


            </div>
        </form>

    </div>

</x-app-layout>