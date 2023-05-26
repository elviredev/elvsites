<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TechnologyFormRequest;
use App\Models\Technology;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TechnologyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Technology::class, 'technology');
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('admin.technologies.index', [
           'technologies' => Technology::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $technology = new Technology();

        return view('admin.technologies.form', [
           'technology' => $technology
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param TechnologyFormRequest $request
     * @return RedirectResponse
     */
    public function store(TechnologyFormRequest $request)
    {
        $technology = Technology::create($request->validated());
        return to_route('admin.technology.index')->with('success', 'La technologie a été créée avec succès 🏅');
    }


    /**
     * Show the form for editing the specified resource.
     * @param Technology $technology
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.form', [
           'technology' => $technology
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param TechnologyFormRequest $request
     * @param Technology $technology
     * @return RedirectResponse
     */
    public function update(TechnologyFormRequest $request, Technology $technology)
    {
        $technology->update($request->validated());
        return to_route('admin.technology.index')->with('success', 'La technologie a été modifiée avec succès 💪');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return to_route('admin.technology.index')->with('success', 'La technologie a été supprimée avec succès 🗑️');
    }
}
