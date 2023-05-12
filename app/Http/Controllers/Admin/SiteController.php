<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteFormRequest;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sites.index', [
           'sites' => Site::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $site = new Site();
        return view('admin.sites.form', [
           'site' => $site
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SiteFormRequest $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
