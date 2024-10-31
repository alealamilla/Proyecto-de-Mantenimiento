<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Http\Requests\SparepartRequest;

/**
 * Class SparepartController
 * @package App\Http\Controllers
 */
class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spareparts = Sparepart::paginate();
        $this->authorize("viewAny", Sparepart::class);
        return view('sparepart.index', compact('spareparts'))
            ->with('i', (request()->input('page', 1) - 1) * $spareparts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sparepart = new Sparepart();
        $this->authorize("create", Sparepart::class);
        return view('sparepart.create', compact('sparepart'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SparepartRequest $request)
    {
        Sparepart::create($request->validated());
        $this->authorize("create", Sparepart::class);
        return redirect()->route('spareparts.index')
            ->with('success', 'Sparepart created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sparepart = Sparepart::find($id);

        return view('sparepart.show', compact('sparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sparepart = Sparepart::find($id);
        $this->authorize("update", $sparepart);

        return view('sparepart.edit', compact('sparepart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SparepartRequest $request, Sparepart $sparepart)
    {
        $sparepart->update($request->validated());
        $this->authorize("update", $sparepart);
        return redirect()->route('spareparts.index')
            ->with('success', 'Sparepart updated successfully');
    }

    public function destroy($id)
    {
        Sparepart::find($id)->delete();
        

        return redirect()->route('spareparts.index')
            ->with('success', 'Sparepart deleted successfully');
    }
}
