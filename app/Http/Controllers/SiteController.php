<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchSitesRequest;
use App\Models\Category;
use App\Models\Site;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SiteController extends Controller
{
    /**
     * Affiche la liste des sites - Pagination
     * Barre de recherche multicritères
     * @param SearchSitesRequest $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(SearchSitesRequest $request)
    {
        $query = Site::query()->with('category');
        $categories = Category::query()->get();

        if ($request->validated('name')) {
            $query = $query->where('name', 'like', "%{$request->validated('name')}%");
        }
        if ($request->validated('year')) {
            $query = $query->where('year', '=', $request->validated('year'));
        }
        if ($request->validated('category')) {
            $query = $query->where('category_id', '=', $request->validated('category'));
        }


        return view('site.index', [
           'sites' => $query->paginate(9),
           'input' => $request->validated(),
           'categories' => $categories
        ]);
    }

    /**
     * Affiche la page de détail d'un site
     * @param string $slug
     * @param Site $site
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function show(string $slug, Site $site)
    {
        $expectedSlug = $site->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('site.show', ['slug' => $expectedSlug, 'site' => $site]);
        }

        return view('site.show', [
            'site' => $site
        ]);
    }
}
