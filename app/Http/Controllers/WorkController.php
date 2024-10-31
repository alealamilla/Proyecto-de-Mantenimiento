<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Http\Requests\WorkRequest;
use App\Models\Reception;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\User;

/**
 * Class WorkController
 * @package App\Http\Controllers
 */
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::paginate();
        $this->authorize("viewAny", Work::class);

        return view('work.index', compact('works'))
            ->with('i', (request()->input('page', 1) - 1) * $works->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $work = new Work();
        $receptions = Reception::all();
        $services = Service::all();
        $spareparts = Sparepart::all();
        $users = User::all();
        $this->authorize("create", Work::class);
        return view('work.create', compact('work','receptions', 'services', 'spareparts', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkRequest $request)
    {
        Work::create($request->validated());
        $this->authorize("create", Work::class);

        return redirect()->route('works.index')
            ->with('success', 'Work created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $work = Work::find($id);

        return view('work.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $work = Work::find($id);
        $receptions = Reception::all();
        $services = Service::all();
        $spareparts = Sparepart::all();
        $users = User::all();
        $this->authorize("update", $work);

        return view('work.edit', compact('work','receptions', 'services', 'spareparts', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkRequest $request, Work $work)
    {
        $work->update($request->validated());
        $this->authorize("update", $work);

        return redirect()->route('works.index')
            ->with('success', 'Work updated successfully');
    }

    public function destroy($id)
    {
        Work::find($id)->delete();

        return redirect()->route('works.index')
            ->with('success', 'Work deleted successfully');
    }
}
