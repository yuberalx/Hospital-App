<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('turnos.store') }}" method="POST">
                        @csrf
                        <table>
                            <tr>
                                <td><label for="tipocita">Especialista</label></td>
                                <td>
                                    <select name="tipo" id="tipo" class="text-gray-700 block px-4 py-2 text-sm mr-2 ml-2">
                                        <option value="0">Seleccione..</option>
                                        <option value="1">Medico General</option>
                                        <option value="2">Pediatría</option>
                                        <option value="3">Odontología</option>
                                    </select>
                                </td>
                            
                       
                                <td><button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">Solicitar</button></td>
                     
                                <td><a class="mr-2 ml-2 flex w-full justify-center rounded-md bg-red-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('turnos.index') }}">Cancelar</a></td>
                        </tr>

                        </table>
                        <input type="hidden" value="{{ $ultimoId + 1 }}" name="turno">
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>