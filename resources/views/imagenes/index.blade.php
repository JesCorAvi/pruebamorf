<x-app-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($imagenes as $imagen)

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{route("imagenes.show", $imagen)}}">{{$imagen->nombre}}</a>
                    </th>
                    <td class="px-6 py-4">
                        <img src={{asset("$imagen->url")}}>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route("comentarios.create")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <input type="hidden" name="type" value="imagen">
                            <input type="hidden" name="id" value="{{$imagen->id}}">
                            <button>Comentar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <a href="{{route("imagenes.create")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Crear</a>

    </div>

</x-app-layout>
