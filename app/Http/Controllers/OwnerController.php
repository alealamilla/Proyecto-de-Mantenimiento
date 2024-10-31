<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\OwnerRequest;

/**
 * Class OwnerController
 * @package App\Http\Controllers
 */
class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::paginate();
        $this->authorize("viewAny", Owner::class);

        return view('owner.index', compact('owners'))
            ->with('i', (request()->input('page', 1) - 1) * $owners->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owner = new Owner();
        $this->authorize("create", Owner::class);
        return view('owner.create', compact('owner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnerRequest $request)
    {
        Owner::create($request->validated());
        $this->authorize("create", Owner::class);
        return redirect()->route('owners.index')
            ->with('success', 'Owner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $owner = Owner::find($id);

        return view('owner.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $owner = Owner::find($id);
        $this->authorize("update", $owner);

        return view('owner.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnerRequest $request, Owner $owner)
    {
        $owner->update($request->validated());
        $this->authorize("update", $owner);

        return redirect()->route('owners.index')
            ->with('success', 'Owner updated successfully');
    }

    public function destroy($id)
    {
        Owner::find($id)->delete();

        return redirect()->route('owners.index')
            ->with('success', 'Owner deleted successfully');
    }
}
