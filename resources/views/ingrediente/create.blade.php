<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear Ingrediente')}}
            </h2>
            
    </x-slot>
<!-- component -->


<div>

            <form action="{{ route('ingrediente.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                
                    <div class="form-group">
                        <label for="nombre">
                            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Nombre" type="text" name="nombre" id="nombre">    
                         </label>
                         @error('nombre')
                            <small class="danger">{{$message}}</small>
                        @enderror
                    </div>
                        
                        
                        
                        <!-- buttons -->

                            
                            <div class="form-group">
                                <button class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " >Guardar</button>
                            </div>
                        
                        
                </div>
            </form>
           
</div>
</x-app-layout>