<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">USUARIO</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ESTADO</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CITA CON</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">VALOR</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turnoactivos as $turno)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap ">{{ $turno->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap ">ATENDIENDO</td>
                                @if($turno->tipo == 1)
                                <td class="px-6 py-4 whitespace-nowrap ">Medico General</td>
                                <td class="px-6 py-4 whitespace-nowrap ">3.000</td>
                                @elseif($turno->tipo == 2)
                                <td class="px-6 py-4 whitespace-nowrap ">Pediatría</td>
                                <td class="px-6 py-4 whitespace-nowrap ">5.000</td>
                                @else
                                <td class="px-6 py-4 whitespace-nowrap ">Odontología</td>
                                <td class="px-6 py-4 whitespace-nowrap ">4.000</td>
                                @endif
                                <td><a class="mr-2 ml-2 flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('turnos.autorizo', ['id' => $turno->id]) }}">AUTORIZO</a></td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>