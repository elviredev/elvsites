<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('admin.categories.index', [
           'categories' => Category::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $category = new Category();

        return view('admin.categories.form', [
           'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryFormRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryFormRequest $request)
    {
        $category = Category::create($request->validated());
        return to_route('admin.category.index')->with('success', 'La catégorie a été créée avec succès 🏅');
    }


    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Category $category)
    {
        return view('admin.categories.form', [
           'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryFormRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route('admin.category.index')->with('success', 'La catégorie a été modifiée avec succès 💪');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.category.index')->with('success', 'La catégorie a été supprimée avec succès 🗑️');
    }
}
