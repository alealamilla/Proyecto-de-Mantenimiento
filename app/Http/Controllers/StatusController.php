<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StatusRequest;

/**
 * Class StatusController
 * @package App\Http\Controllers
 */
class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::paginate();
        $this->authorize("viewAny", Status::class);
        return view('status.index', compact('statuses'))
            ->with('i', (request()->input('page', 1) - 1) * $statuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = new Status();
        $this->authorize("create", Status::class);
        return view('status.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request)
    {
        Status::create($request->validated());
        $this->authorize("create", Status::class);

        return redirect()->route('statuses.index')
            ->with('success', 'Status created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $status = Status::find($id);

        return view('status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $status = Status::find($id);
        $this->authorize("update", $status);

        return view('status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusRequest $request, Status $status)
    {
        $status->update($request->validated());
        $this->authorize("update", $status);

        return redirect()->route('statuses.index')
            ->with('success', 'Status updated successfully');
    }

    public function destroy($id)
    {
        Status::find($id)->delete();
        

        return redirect()->route('statuses.index')
            ->with('success', 'Status deleted successfully');
    }
}
