<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Generar Factura') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('generarFac') }}" method="POST">
                        @csrf
                        <table class="min-w-full divide-y divide-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TURNO ACTUAL</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">USUARIO</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CEDULA</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">FACTURA</th>
                            </tr>
                            <tr>
                                @if($turnoactual->tipo == 1)
                                <td class="px-6 py-4 whitespace-nowrap">G-{{ sprintf('%03d', $turnoactual->id) }}</td>
                                @elseif($turnoactual->tipo == 2)
                                <td class="px-6 py-4 whitespace-nowrap">P-{{ sprintf('%03d', $turnoactual->id) }}</td>
                                @else
                                <td class="px-6 py-4 whitespace-nowrap">O-{{ sprintf('%03d', $turnoactual->id) }}</td>
                                @endif
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $turnoactual->nombre }}
                                </td>
                                <td>
                                    {{ $turnoactual->cedula }}
                                </td>
                                <td>
                                {{ substr(date('Y'), -2 )}}-00{{ $turnoactual->id .'-'. $turnoactual->tipo .'-'. substr($turnoactual->cedula, -3) }}
                                </td>
                            </tr>
    
                            <tr>
                                <td>
                                    <input type="hidden" name="factura" value="{{ substr(date('Y'), -2 )}}-00{{ $turnoactual->id .'-'. $turnoactual->tipo .'-'. substr($turnoactual->cedula, -3) }}" readonly>
                                </td>
                            </tr>
                            <input type="hidden" name="id" value="{{$turnoactual->id}}">

                            <tr>
                                <td>
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">GENERA FACTURA</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>