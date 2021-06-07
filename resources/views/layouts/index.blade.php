<x-app-layout>

<header class="bg-purple-100 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
    </div>
 </header>

    <x-slot name="slot">

    <div class="w-2/3 mx-auto">
        <div class="bg-purple-100 shadow-md rounded my-6">
            <table class="text-left w-full border-collapse" id="myTable">
                <thead>
                    <tr>
                        @foreach ($titulos as $titulo)
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{$titulos}}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($elementos as $elemento)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{$elemento->nombre}}</td>
                            @auth
                                <td class="py-4 px-6 border-b border-grey-light flex flex-row-3">
                                    <a href="{{route($rutaShow)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark"><i class="fa fa-search mr-1"></i>Ver</a>			    					
                                    <a href="{{route($rutaEdit)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark"><i class="fa fa-pencil mr-1"></i>Editar</a>
                                        <form action="{{ route($rutaDestroy) }}" method="POST">
                                            @csrf
                                                @method("DELETE")
                                                <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark" type="submit"><i class="fa fa-trash mr-1"></i>Eliminar</button>
                                        </form>
                                </td>
                            @endauth
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
  </div>






    <script>
      function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
      }
  </script>

</x-slot>






</x-app-layout>