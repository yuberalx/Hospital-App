<?php

namespace App\Http\Controllers;

use App\Models\Turnos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TurnosController extends Controller
{

    public function index()
    {
        $turnos = Turnos::whereIn('estado', ['ENTURNO', 'ACTIVO'])->get();
        return view('turnos.index', compact('turnos'));
    }


    public function activaturno()
    {
        $turnoactivos = Turnos::whereIn('estado', ['ENTURNO', 'ACTIVO'])->get();

        // Si $turnoactivo es nulo (no hay resultados), Laravel manejará automáticamente la vista adecuada
        return view('personal.activaturno', compact('turnoactivos'));
    }


    public function create()
    {
        $ultimoTurno = Turnos::orderBy('id', 'desc')->first();

        if ($ultimoTurno) {
            $ultimoId = $ultimoTurno->id;
        } else {
            $ultimoId = 0;
        }
        return view('turnos.crear', compact('ultimoId'));
    }

    public function store(Request $request)
    {
        $users = Auth::user();

        // foreach ($users as $user) {
        //     $user->cedula;
        //     $user->name;
        // }

        $request->validate([
            'tipo' => 'required|integer|min:1'
        ]);

        $turno = Turnos::create([
            'nombre' => $users->name,
            'cedula' => $users->cedula,
            'estado' => 'ACTIVO',
            'tipo' => $request->tipo
        ]);

        $ultimoIdInsertado = $turno->id;

        $this->index();
        return redirect()->route('turnos.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function cancelaturno($id, $estado)
    {
        $turno = Turnos::find($id);
        $turno->estado = $estado;
        $turno->save();

        // Redirige al usuario a donde quieras que vaya después de la actualización
        if ($estado == 'CANCELADO') {
            return redirect()->route('personal.activaturno');
        } else {
            return redirect()->route('personal.factura', ['turno' => $turno]);
        }
    }

    public function factura($turno)
    {
        $turnoactual = Turnos::where('id', $turno)->first();
        // dd($turno);
        return view('personal.factura', compact('turnoactual'));
    }

    public function generafactura($id, $estado)
    {
        $turno = Turnos::find($id);
        $turno->estado = $estado;
        $turno->save();

        // Redirige al usuario a donde quieras que vaya después de la actualización
        if ($estado == 'CANCELADO') {
            return redirect()->route('personal.activaturno');
        } else {
            return redirect()->route('personal.factura', ['turno' => $turno]);
        }
    }

    public function generarFac(Request $request)
    {
        $factura = $request->input('factura');
        $id = $request->input('id');

        // Encuentra el turno por ID
        $turno = Turnos::find($id);

        // Verifica si el turno existe
        if ($turno) {
            // Actualiza el estado del turno a 'facturado'
            $turno->estado = 'facturado';
            $turno->factura = $factura;
            $turno->save();

            return redirect()->route('personal.activaturno');
        }
    }

    public function pagaFactura()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Filtrar las facturas asociadas al usuario actual
        $facturas = Turnos::where('cedula', $user->cedula)
            ->where('factura', '!=', '')->where('estado', 'facturado')
            ->get();
        // dd($facturas);

        return view('turnos.paga', ['facturas' => $facturas]);
    }

    public function pagounidad($id)
    {
        $turno = Turnos::find($id);

        // Verifica si el turno existe
        if ($turno) {
            // Actualiza el estado del turno a 'facturado'
            $turno->estado = 'PAGADO';
            $turno->save();

            // Obtener el usuario autenticado
            $user = Auth::user();

            // Filtrar las facturas asociadas al usuario actual
            $facturas = Turnos::where('cedula', $user->cedula)
                ->where('factura', '!=', '')->where('estado', 'facturado')
                ->get();
            // dd($facturas);

            return view('turnos.paga', ['facturas' => $facturas]);
        }
    }

    public function medico()
    {
        $turnoactivos = Turnos::where('estado', ['ENTURNO'])->whereNull('medicamento')->orWhere('medicamento', '')->get();

        // Si $turnoactivo es nulo (no hay resultados), Laravel manejará automáticamente la vista adecuada
        return view('personal.medico', compact('turnoactivos'));
    }
    public function medicamentos($id)
    {
        $turnoactivos = Turnos::where('id', $id)->get();
        // dd($turnoactivos);
        return view('personal.medicamentos', compact('turnoactivos'));
    }

    public function autorizo($id)
    {
        $turno = Turnos::find($id);

        // Verifica si el turno existe
        if ($turno) {
            $turno->medicamento = 'SI';
            $turno->save();

            return $this->medico();
        }
    }
}
