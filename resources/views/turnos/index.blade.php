<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        .text-azul {
            color: blue;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <a class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('turnos.create') }}">Solicitar Turno</a>
                    </div>
                    <br>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TURNO ACTUAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turnos as $turno)
                            <tr>
                                @if($turno->tipo == 1)
                                <td  class="px-6 py-4 whitespace-nowrap {{ $turno->estado == 'ENTURNO' ? 'text-azul' : '' }}">G-{{ sprintf('%03d', $turno->id) }}</td>
                                @elseif($turno->tipo == 2)
                                <td  class="px-6 py-4 whitespace-nowrap {{ $turno->estado == 'ENTURNO' ? 'text-azul' : '' }}">P-{{ sprintf('%03d', $turno->id) }}</td>
                                @else
                                <td  class="px-6 py-4 whitespace-nowrap {{ $turno->estado == 'ENTURNO' ? 'text-azul' : '' }}">O-{{ sprintf('%03d', $turno->id) }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>