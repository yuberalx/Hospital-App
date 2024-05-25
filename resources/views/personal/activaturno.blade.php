<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activar Turno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TURNO ACTUAL</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">USUARIO</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CEDULA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <tr>
                                @if($turnoactivos)
                                @foreach ($turnoactivos as $turnoactivo)
                                @if($turnoactivo->tipo == 1)
                                <td class="px-6 py-4 whitespace-nowrap">G-{{ sprintf('%03d', $turnoactivo->id) }}</td>
                                @elseif($turnoactivo->tipo == 2)
                                <td class="px-6 py-4 whitespace-nowrap">P-{{ sprintf('%03d', $turnoactivo->id) }}</td>
                                @else
                                <td class="px-6 py-4 whitespace-nowrap">O-{{ sprintf('%03d', $turnoactivo->id) }}</td>
                                @endif
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $turnoactivo->nombre }}
                                </td>
                                <td>
                                    {{ $turnoactivo->cedula }}
                                </td>
                                <td>
                                    @if($turnoactivo->estado == 'ENTURNO' && $turnoactivo->medicamento == 'SI')
                                    <a href="{{ route('turnos.cancelaturno', ['id' => $turnoactivo->id, 'estado' => 'ENTURNO']) }}" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">FINALIZAR</a>
                                    @elseif($turnoactivo->estado == 'ENTURNO' && ($turnoactivo->medicamento == '' || $turnoactivo->medicamento == 'NULL'))
                                    <a disabled href="#" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ATENDIENDO</a>
                                    @else
                                    <a href="{{ route('turnos.cancelaturno', ['id' => $turnoactivo->id, 'estado' => 'ENTURNO']) }}" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ACTIVAR</a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('turnos.cancelaturno', ['id' => $turnoactivo->id, 'estado' => 'CANCELADO']) }}" class="mr-2 ml-2 flex w-full justify-center rounded-md bg-red-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">CANCELAR TURNO</a>
                                </td>
                            <tr>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="3">No hay turno activo</td>
                            @endif
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>