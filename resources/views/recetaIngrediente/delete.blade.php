<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $receta->nombre}}
            </h2>
            <h4 class="font-semibold text-m text-gray-800 leading-tight mt-2">Guarde sus ingredientes, y una vez que tenga todos, aprete Listo!</h4>
    </x-slot>
<!-- component -->


<div>

        @foreach($ingredientes as $ingrediente)

            <form action="{{ route('recetaIngrediente.destroy', ['idIngred' => $ingrediente->id_ingrediente, 'idReceta'=>$receta->id_receta]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("DELETE")
                <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                
                    <div class="form-group">
                         <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Nombre" type="text" value=" {{old('nombre_ingrediente') ?? $ingrediente->nombre }} " name="nombre_ingrediente">    
                     </div>
                        <div class="form-group">
                        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Cantidad" type="text" value=" {{old('cantidad') ?? $cantidades[$ingrediente->nombre] }} "  name="cantidad">
                        </div>
                        <div class="form-group" >
                            <input type="hidden" value="{{ $receta->id_receta }}" name="id_receta"></input>
                        </div>
                        
                        <!-- buttons -->

                            
                            <div class="form-group">
                                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " type="submit">Eliminar</button>
                            </div>
                           
                        
                </div>
       
            </form>
        @endforeach
           
</div>
</x-app-layout>