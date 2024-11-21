<?php

namespace App\Http\Controllers;

use App\Models\Reception;
use App\Http\Requests\ReceptionRequest;
use App\Models\Car;
use App\Models\Owner;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\Status;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ReceptionController
 * @package App\Http\Controllers
 */
class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receptions = Reception::paginate();
        $this->authorize("viewAny", Reception::class);

        return view('reception.index', compact('receptions'))
            ->with('i', (request()->input('page', 1) - 1) * $receptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reception = new Reception();
        $owners = Owner::all();
        $cars = Car::all();
        $statuses = Status::all();
        $users = User::all();
        $this->authorize("create", Reception::class);
        return view('reception.create', compact('reception','owners','cars','statuses','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReceptionRequest $request)
    {
        Reception::create($request->validated());
        $this->authorize("create", Reception::class);

        return redirect()->route('receptions.index')
            ->with('success', 'La recepción se guardo exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reception = Reception::find($id);

        return view('reception.show', compact('reception'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reception = Reception::find($id);
        $owners = Owner::all();
        $cars = Car::all();
        $statuses = Status::all();
        $users = User::all();
        $work = new Work();
        $services = Service::all();
        $spareparts = Sparepart::all();
        $this->authorize("update", $reception);

        return view('reception.edit', compact('reception','owners','cars','statuses','users','work','services','spareparts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReceptionRequest $request, Reception $reception)
    {
        $reception->update($request->validated());
        $this->authorize("update", $reception);

        return redirect()->route('receptions.index')
            ->with('success', 'Recepción editada exitosamente');
    }

    public function destroy($id)
    {
        $reception =Reception::find($id);
        $this->authorize("delete", $reception);
        $reception->delete();

        return response()->json($reception);
    }

    public function list()
    {
        $reception = Reception::with("user", "status", "owner", "car")->get();

        return DataTables::of($reception) ->make(true);
    }

    public function follows()
    {
        $reception = Reception::with("user", "status", "owner", "car")->whereNotNull("next_reception")->get();

        return DataTables::of($reception) ->make(true);
    }

    public function dash(Request $request)
    {
        // Filtrado por fecha si se pasa un parámetro de fecha
        $dateFilter = $request->input('date_filter');
        if ($dateFilter) {
            $receptions = Reception::whereDate('reception_date', $dateFilter)->get();
        } else {
            // Si no se pasa filtro, obtener todos los registros
            $receptions = Reception::all();
        }

        // Contar las solicitudes por estatus
        $statusesCount = $receptions->groupBy('status_id')->map(function ($group) {
            return $group->count();
        });

        // Pasar los datos a la vista
        return view('dashboard.index', compact('statusesCount', 'dateFilter'));
    }

    

}
