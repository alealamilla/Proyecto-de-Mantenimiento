<?php

namespace App\Http\Controllers;

use App\Models\Reception;
use App\Http\Requests\ReceptionRequest;
use App\Models\Car;
use App\Models\Owner;
use App\Models\Status;
use App\Models\User;

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
            ->with('success', 'Reception created successfully.');
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
        $this->authorize("update", $reception);

        return view('reception.edit', compact('reception','owners','cars','statuses','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReceptionRequest $request, Reception $reception)
    {
        $reception->update($request->validated());
        $this->authorize("update", $reception);

        return redirect()->route('receptions.index')
            ->with('success', 'Reception updated successfully');
    }

    public function destroy($id)
    {
        Reception::find($id)->delete();

        return redirect()->route('receptions.index')
            ->with('success', 'Reception deleted successfully');
    }
}