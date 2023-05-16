<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchSitesRequest;
use App\Models\Category;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
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
           'sites' => $query->paginate(6),
           'input' => $request->validated(),
           'categories' => $categories
        ]);
    }

    public function show(string $slug, Site $site)
    {

    }
}
