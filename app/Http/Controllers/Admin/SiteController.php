<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteFormRequest;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Site;
use App\Models\Technology;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('admin.sites.index', [
           'sites' => Site::with('category')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $site = new Site();
        $site->fill([
            'year' => 2024,
            'client' => 'Personnel',
            'published' => false,
            'github' => false
        ]);

        return view('admin.sites.form', [
           'site' => $site,
           'categories' => Category::select('id', 'name')->get(),
           'technologies' => Technology::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param SiteFormRequest $request
     * @return RedirectResponse
     */
    public function store(SiteFormRequest $request)
    {
        $site = Site::create($request->validated());
        $site->technologies()->sync($request->validated('technologies'));
        $site->attachFiles($request->validated('pictures'));
        return to_route('admin.site.index')->with('success', 'Le site a été créé avec succès 🏅');
    }


    /**
     * Show the form for editing the specified resource.
     * @param Site $site
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Site $site)
    {
        return view('admin.sites.form', [
           'site' => $site,
           'categories' => Category::select('id', 'name')->get(),
           'technologies' => Technology::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param SiteFormRequest $request
     * @param Site $site
     * @return RedirectResponse
     */
    public function update(SiteFormRequest $request, Site $site)
    {
        $site->update($request->validated());
        $site->technologies()->sync($request->validated('technologies'));
        $site->attachFiles($request->validated('pictures'));
        return to_route('admin.site.index')->with('success', 'Le site a été modifié avec succès 💪');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        // Supprimer les images associées au site
        Picture::destroy($site->pictures()->pluck('id'));

        // Supprimer le site
        $site->delete();
        return to_route('admin.site.index')->with('success', 'Le site a été supprimé avec succès 🗑️');
    }
}
